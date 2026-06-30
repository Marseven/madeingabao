<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('public.contact');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:120'],
            'email'   => ['required', 'email', 'max:160'],
            'subject' => ['nullable', 'string', 'max:160'],
            'message' => ['required', 'string', 'max:2000'],
            'website' => ['nullable', 'size:0'], // honeypot
        ]);

        // Envoi simple vers l'adresse de contact de l'événement.
        try {
            Mail::raw($data['message'], function ($mail) use ($data) {
                $mail->to(config('event.contact_email'))
                    ->replyTo($data['email'], $data['name'])
                    ->subject('[Contact] ' . ($data['subject'] ?? 'Message du site Made in Gabao'));
            });
        } catch (\Throwable $e) {
            report($e);
        }

        return back()->with('success', 'Merci, ton message a bien été envoyé. On te répond vite.');
    }
}
