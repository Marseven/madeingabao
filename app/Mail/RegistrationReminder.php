<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Email de relance envoyé depuis l'admin (canal "email").
 * Peut inclure un message personnalisé saisi par l'organisateur.
 */
class RegistrationReminder extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Registration $registration,
        public ?string $customMessage = null,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rappel — ' . config('event.short_name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.registration-reminder',
            with: [
                'registration'  => $this->registration,
                'customMessage' => $this->customMessage,
            ],
        );
    }
}
