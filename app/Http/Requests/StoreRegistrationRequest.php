<?php

namespace App\Http\Requests;

use App\Models\Registration;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

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

    /**
     * Anti-doublon intelligent : un même email OU téléphone ne peut pas
     * s'inscrire deux fois pour une même "session" (événement / veillées).
     * On autorise à compléter (ex. déjà en présentiel → peut ajouter les veillées),
     * mais on bloque tout chevauchement, avec un message clair.
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            if ($validator->errors()->isNotEmpty()) {
                return; // ne pas empiler sur des erreurs de format
            }

            $emailNorm = mb_strtolower(trim((string) $this->input('email')));
            $phone     = trim((string) $this->input('phone'));

            $existing = Registration::query()
                ->active()
                ->where(function ($q) use ($emailNorm, $phone) {
                    $q->whereRaw('LOWER(email) = ?', [$emailNorm]);
                    if ($phone !== '') {
                        $q->orWhere('phone', $phone);
                    }
                })
                ->get();

            if ($existing->isEmpty()) {
                return;
            }

            $hasEvent    = $existing->contains(fn (Registration $r) => $r->attendsEvent());
            $hasVeillees = $existing->contains(fn (Registration $r) => $r->attendsVeillees());

            $type         = mb_strtolower((string) $this->input('participation_type'));
            $wantsEvent    = str_contains($type, 'présentiel') || str_contains($type, 'presentiel') || str_contains($type, 'deux');
            $wantsVeillees = str_contains($type, 'veill') || str_contains($type, 'ligne') || str_contains($type, 'deux');

            $overlap = ($wantsEvent && $hasEvent) || ($wantsVeillees && $hasVeillees);

            if (! $overlap) {
                return; // pas de conflit (ex. déjà en présentiel, demande les veillées)
            }

            if ($hasEvent && $hasVeillees) {
                $msg = "Cet email ou téléphone est déjà inscrit à l'événement ET aux veillées. Aucune nouvelle inscription n'est nécessaire — tu peux récupérer ton billet dans « Mon billet ».";
            } elseif ($hasEvent) {
                $msg = $wantsVeillees
                    ? "Tu es déjà inscrit·e à l'événement du 12 septembre avec cet email ou téléphone. Pour ajouter les veillées, choisis plutôt l'option « En ligne (veillées) »."
                    : "Tu es déjà inscrit·e à l'événement du 12 septembre avec cet email ou téléphone.";
            } else { // $hasVeillees
                $msg = $wantsEvent
                    ? "Tu es déjà inscrit·e aux veillées en ligne avec cet email ou téléphone. Pour ajouter l'événement, choisis plutôt l'option « Présentiel — Libreville »."
                    : "Tu es déjà inscrit·e aux veillées en ligne avec cet email ou téléphone.";
            }

            $validator->errors()->add('duplicate', $msg);
        });
    }
}
