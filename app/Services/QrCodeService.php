<?php

namespace App\Services;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * Génère des QR codes au format SVG (aucune extension imagick requise,
 * compatible affichage web et rendu DomPDF).
 */
class QrCodeService
{
    /**
     * QR code SVG inline pour une inscription, encodant l'URL de check-in.
     */
    public function forToken(string $token, int $size = 220): string
    {
        $url = route('checkin', $token);

        return $this->svg($url, $size);
    }

    public function svg(string $data, int $size = 220): string
    {
        return (string) QrCode::format('svg')
            ->size($size)
            ->margin(1)
            ->errorCorrection('M')
            ->generate($data);
    }

    /**
     * Data-URI SVG du QR de check-in — rendu fiable dans DomPDF via <img>.
     */
    public function dataUriForToken(string $token, int $size = 150): string
    {
        $svg = $this->svg(route('checkin', $token), $size);

        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }
}
