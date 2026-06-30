<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registration_messages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('registration_id')
                  ->constrained('registrations')
                  ->cascadeOnDelete();

            $table->string('channel');                 // email | whatsapp
            $table->string('recipient');               // email ou numéro
            $table->text('message')->nullable();
            $table->string('status')->default('pending'); // pending | sent | failed
            $table->timestamp('sent_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registration_messages');
    }
};
