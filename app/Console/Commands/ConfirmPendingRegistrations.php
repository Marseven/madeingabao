<?php

namespace App\Console\Commands;

use App\Models\Registration;
use Illuminate\Console\Command;

class ConfirmPendingRegistrations extends Command
{
    protected $signature = 'registrations:confirm-pending
                            {--dry-run : Afficher le nombre concerné sans rien modifier}';

    protected $description = 'Passe toutes les inscriptions "en attente" (pending) en "confirmée" (confirmed).';

    public function handle(): int
    {
        $count = Registration::where('status', 'pending')->count();

        if ($count === 0) {
            $this->info('Aucune inscription en attente. Rien à faire. ✓');
            return self::SUCCESS;
        }

        if ($this->option('dry-run')) {
            $this->warn("[dry-run] {$count} inscription(s) en attente seraient confirmée(s). Aucune modification effectuée.");
            return self::SUCCESS;
        }

        $updated = Registration::where('status', 'pending')->update(['status' => 'confirmed']);

        $this->info("✓ {$updated} inscription(s) confirmée(s).");

        return self::SUCCESS;
    }
}
