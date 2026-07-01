<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Registration extends Model
{
    use HasFactory, SoftDeletes;

    public const STATUSES = ['pending', 'confirmed', 'cancelled'];

    protected $fillable = [
        'reference',
        'full_name',
        'email',
        'phone',
        'organization',
        'position',
        'city',
        'participation_type',
        'consent',
        'message',
        'status',
        'qr_code_token',
        'checked_in_at',
        'checked_in_by',
        'checkin_status',
    ];

    protected $casts = [
        'consent'       => 'boolean',
        'checked_in_at' => 'datetime',
    ];

    /**
     * Génère automatiquement la référence et le token QR à la création.
     */
    protected static function booted(): void
    {
        static::creating(function (Registration $registration) {
            $registration->reference ??= static::generateReference();
            $registration->qr_code_token ??= (string) Str::uuid();
            $registration->status ??= 'pending';
        });
    }

    public static function generateReference(): string
    {
        do {
            $ref = 'MIG-' . now()->format('Y') . '-' . strtoupper(Str::random(6));
        } while (static::where('reference', $ref)->exists());

        return $ref;
    }

    public function messages(): HasMany
    {
        return $this->hasMany(RegistrationMessage::class);
    }

    /* ----------------------------------------------------------------
     | Helpers d'état
     * ---------------------------------------------------------------- */

    public function isCheckedIn(): bool
    {
        return $this->checked_in_at !== null;
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            'confirmed' => 'Confirmée',
            'cancelled' => 'Annulée',
            default     => 'En attente',
        };
    }

    public function statusColor(): string
    {
        return match ($this->status) {
            'confirmed' => 'green',
            'cancelled' => 'red',
            default     => 'gold',
        };
    }

    /* ----------------------------------------------------------------
     | Participation (détecte les sessions concernées par mots-clés,
     | robuste même si les libellés du formulaire changent)
     * ---------------------------------------------------------------- */

    public function attendsEvent(): bool
    {
        $p = mb_strtolower($this->participation_type ?? '');
        return str_contains($p, 'présentiel') || str_contains($p, 'presentiel') || str_contains($p, 'deux');
    }

    public function attendsVeillees(): bool
    {
        $p = mb_strtolower($this->participation_type ?? '');
        return str_contains($p, 'veill') || str_contains($p, 'ligne') || str_contains($p, 'deux');
    }

    /** Dates des veillées jointes (ex. "Jeu. 16 juillet · Jeu. 20 août · Jeu. 3 septembre"). */
    public function veilleesDatesLabel(): string
    {
        return collect(config('event.veillees', []))
            ->map(fn ($v) => $v['date_label'])
            ->implode(' · ');
    }

    /* ----------------------------------------------------------------
     | Scopes
     * ---------------------------------------------------------------- */

    public function scopeStatus($query, ?string $status)
    {
        return $status ? $query->where('status', $status) : $query;
    }

    /** Inscriptions actives (non annulées). */
    public function scopeActive($query)
    {
        return $query->where('status', '!=', 'cancelled');
    }

    public function scopeSearch($query, ?string $term)
    {
        if (! $term) {
            return $query;
        }

        return $query->where(function ($q) use ($term) {
            $like = '%' . $term . '%';
            $q->where('full_name', 'like', $like)
              ->orWhere('email', 'like', $like)
              ->orWhere('phone', 'like', $like)
              ->orWhere('organization', 'like', $like)
              ->orWhere('reference', 'like', $like);
        });
    }
}
