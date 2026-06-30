<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RegistrationsExport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Public\InvitationController;
use App\Models\Registration;
use App\Models\RegistrationMessage;
use App\Services\QrCodeService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $registrations = Registration::query()
            ->search($request->input('q'))
            ->status($request->input('status'))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.registrations.index', [
            'registrations' => $registrations,
            'q'             => $request->input('q'),
            'status'        => $request->input('status'),
            'statuses'      => Registration::STATUSES,
        ]);
    }

    public function show(Registration $registration, QrCodeService $qr)
    {
        return view('admin.registrations.show', [
            'registration' => $registration,
            'qrSvg'        => $qr->forToken($registration->qr_code_token, 200),
            'messages'     => $registration->messages()->latest()->get(),
        ]);
    }

    public function updateStatus(Request $request, Registration $registration)
    {
        $data = $request->validate([
            'status' => ['required', 'in:' . implode(',', Registration::STATUSES)],
        ]);

        $registration->update($data);

        return back()->with('success', 'Statut mis à jour.');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete(); // soft delete

        return redirect()
            ->route('admin.registrations.index')
            ->with('success', 'Inscription supprimée.');
    }

    public function export()
    {
        $filename = 'inscriptions-' . str(config('event.short_name'))->slug()
            . '-' . now()->format('Y-m-d') . '.xlsx';

        return Excel::download(new RegistrationsExport, $filename);
    }

    public function invitation(Registration $registration, QrCodeService $qr)
    {
        return InvitationController::renderPdf($registration, $qr);
    }

    /**
     * Journalise une relance (email / whatsapp). L'envoi réel email/WhatsApp
     * sera branché plus tard ; on prépare ici la traçabilité.
     */
    public function remind(Request $request, Registration $registration)
    {
        $data = $request->validate([
            'channel' => ['required', 'in:' . implode(',', RegistrationMessage::CHANNELS)],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        $registration->messages()->create([
            'channel'   => $data['channel'],
            'recipient' => $data['channel'] === 'email' ? $registration->email : $registration->phone,
            'message'   => $data['message'] ?? null,
            'status'    => 'pending', // sera passé à "sent" quand un canal réel sera branché
        ]);

        return back()->with('success', 'Relance enregistrée (' . $data['channel'] . '). Envoi réel à brancher.');
    }
}
