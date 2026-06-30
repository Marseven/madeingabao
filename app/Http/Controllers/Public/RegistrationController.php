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

        // Email de confirmation (silencieux si le mailer échoue — log par défaut).
        try {
            Mail::to($registration->email)->send(new RegistrationConfirmation($registration));
        } catch (\Throwable $e) {
            report($e);
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
