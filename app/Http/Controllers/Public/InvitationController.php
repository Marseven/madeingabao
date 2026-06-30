<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Services\QrCodeService;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Invitation PDF accessible publiquement via le token unique de l'inscription
 * (URL non devinable). Réutilisé par l'admin.
 */
class InvitationController extends Controller
{
    public function show(string $token, QrCodeService $qr)
    {
        $registration = Registration::where('qr_code_token', $token)->firstOrFail();

        return $this->renderPdf($registration, $qr);
    }

    public static function renderPdf(Registration $registration, QrCodeService $qr)
    {
        $pdf = Pdf::loadView('pdf.invitation', [
            'registration' => $registration,
            'qrUri'        => $qr->dataUriForToken($registration->qr_code_token, 150),
        ])->setPaper('a4');

        $filename = 'invitation-' . $registration->reference . '.pdf';

        return $pdf->stream($filename);
    }
}
