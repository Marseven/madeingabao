<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            // Référence publique unique (ex. MIG-2026-A1B2C3)
            $table->string('reference')->unique();

            // Identité du participant
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');                       // téléphone / WhatsApp
            $table->string('organization')->nullable();
            $table->string('position')->nullable();        // fonction / poste
            $table->string('city')->nullable();
            $table->string('participation_type')->nullable();

            // Consentement & message
            $table->boolean('consent')->default(false);
            $table->text('message')->nullable();

            // Statut de l'inscription
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])
                  ->default('pending')
                  ->index();

            // QR code / billetterie
            $table->string('qr_code_token', 64)->unique();

            // Check-in (préparé pour un futur scan à l'entrée)
            $table->timestamp('checked_in_at')->nullable();
            $table->string('checked_in_by')->nullable();
            $table->string('checkin_status')->nullable();  // null | checked_in | denied

            $table->timestamps();
            $table->softDeletes();

            $table->index(['email']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
