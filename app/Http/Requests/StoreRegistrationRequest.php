<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name'          => ['required', 'string', 'max:120'],
            'email'              => ['required', 'email', 'max:160'],
            'phone'              => ['required', 'string', 'max:40'],
            'organization'       => ['nullable', 'string', 'max:160'],
            'position'           => ['nullable', 'string', 'max:120'],
            'city'               => ['nullable', 'string', 'max:120'],
            'participation_type' => ['nullable', 'string', 'max:120'],
            'consent'            => ['accepted'],
            'message'            => ['nullable', 'string', 'max:1000'],
            // Honeypot anti-spam (doit rester vide)
            'website'            => ['nullable', 'size:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Le nom complet est obligatoire.',
            'email.required'     => 'L\'email est obligatoire.',
            'email.email'        => 'Merci d\'indiquer un email valide.',
            'phone.required'     => 'Le téléphone / WhatsApp est obligatoire.',
            'consent.accepted'   => 'Merci d\'accepter de recevoir les communications de l\'événement.',
            'website.size'       => 'Échec de validation.',
        ];
    }
}
