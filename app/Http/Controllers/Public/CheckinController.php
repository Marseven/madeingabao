<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Services\QrCodeService;

/**
 * Page de vérification ouverte par le scan du QR code.
 * Pour l'instant : affichage des infos + statut. Le check-in réel
 * (marquage checked_in_at) sera branché lors d'une prochaine évolution.
 */
class CheckinController extends Controller
{
    public function show(string $token, QrCodeService $qr)
    {
        $registration = Registration::where('qr_code_token', $token)->firstOrFail();

        return view('public.checkin', [
            'registration' => $registration,
            'qrSvg'        => $qr->forToken($token, 160),
        ]);
    }
}
