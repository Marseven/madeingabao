<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RegistrationsExport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Public\InvitationController;
use App\Mail\RegistrationReminder;
use App\Models\Registration;
use App\Models\RegistrationMessage;
use App\Services\QrCodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class RegistrationController extends Controller
{
    public function index()
    {
        // Toutes les inscriptions : la recherche / le tri / la pagination
        // sont gérés côté client par DataTables.
        $registrations = Registration::query()->latest()->get();

        return view('admin.registrations.index', [
            'registrations' => $registrations,
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

        $recipient = $data['channel'] === 'email' ? $registration->email : $registration->phone;

        $log = $registration->messages()->create([
            'channel'   => $data['channel'],
            'recipient' => $recipient,
            'message'   => $data['message'] ?? null,
            'status'    => 'pending',
        ]);

        // --- Canal EMAIL : envoi réel (SMTP configuré) ---
        if ($data['channel'] === 'email') {
            if (empty($registration->email)) {
                $log->update(['status' => 'failed']);
                return back()->with('error', 'Aucune adresse email pour cet inscrit.');
            }

            try {
                Mail::to($registration->email)
                    ->send(new RegistrationReminder($registration, $data['message'] ?? null));

                $log->update(['status' => 'sent', 'sent_at' => now()]);

                return back()->with('success', 'Relance email envoyée à ' . $registration->email . '.');
            } catch (\Throwable $e) {
                report($e);
                $log->update(['status' => 'failed']);

                return back()->with('error', "Échec de l'envoi email : " . $e->getMessage());
            }
        }

        // --- Canal WHATSAPP : pas encore branché (aucune API configurée) ---
        // La relance est journalisée en "pending" ; brancher ici l'API WhatsApp
        // (Meta Cloud API, Twilio, Wati…) puis passer le statut à "sent".
        return back()->with('success', 'Relance WhatsApp enregistrée (' . $recipient . '). Envoi WhatsApp réel à brancher.');
    }
}
