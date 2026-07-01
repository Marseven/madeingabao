<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Mail\RegistrationConfirmation;
use App\Models\Registration;
use App\Services\QrCodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function create()
    {
        abort_unless(config('event.registration_open'), 423, 'Les inscriptions ne sont pas encore ouvertes.');

        return view('public.register');
    }

    public function store(StoreRegistrationRequest $request)
    {
        abort_unless(config('event.registration_open'), 423);

        $registration = Registration::create($request->safe()->except('website'));

        // Email de confirmation — envoyé pour de vrai, et son statut est journalisé
        // (visible dans l'admin) pour pouvoir vérifier qu'il est bien parti.
        // L'échec éventuel ne bloque PAS l'inscription.
        $log = $registration->messages()->create([
            'channel'   => 'email',
            'recipient' => $registration->email,
            'message'   => "Email de confirmation d'inscription",
            'status'    => 'pending',
        ]);

        try {
            Mail::to($registration->email)->send(new RegistrationConfirmation($registration));
            $log->update(['status' => 'sent', 'sent_at' => now()]);
        } catch (\Throwable $e) {
            report($e);
            $log->update(['status' => 'failed']);
        }

        return redirect()
            ->route('register.thanks', $registration->reference)
            ->with('success', 'Inscription enregistrée !');
    }

    public function thanks(Registration $registration, QrCodeService $qr)
    {
        return view('public.register-thanks', [
            'registration' => $registration,
            'qrSvg'        => $qr->forToken($registration->qr_code_token, 180),
        ]);
    }
}
