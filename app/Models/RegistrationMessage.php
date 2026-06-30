<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Journal des relances envoyées à un inscrit.
 * Sert de base aux futures campagnes email / WhatsApp.
 */
class RegistrationMessage extends Model
{
    use HasFactory;

    public const CHANNELS = ['email', 'whatsapp'];

    protected $fillable = [
        'registration_id',
        'channel',
        'recipient',
        'message',
        'status',
        'sent_at',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class);
    }
}
