<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /** Formulaire « Télécharger mon billet ». */
    public function show()
    {
        return view('public.ticket', ['results' => null]);
    }

    /** Recherche des inscriptions par email OU téléphone. */
    public function find(Request $request)
    {
        $data = $request->validate([
            'identifier' => ['required', 'string', 'max:160'],
            'website'    => ['nullable', 'size:0'], // honeypot
        ], [
            'identifier.required' => 'Merci d\'indiquer ton email ou ton téléphone.',
            'website.size'        => 'Échec de validation.',
        ]);

        $id        = trim($data['identifier']);
        $emailNorm = mb_strtolower($id);
        $digits    = preg_replace('/\D+/', '', $id);

        // Recherche tolérante (email insensible à la casse, téléphone comparé en chiffres).
        $results = Registration::query()
            ->active()
            ->get()
            ->filter(function (Registration $r) use ($emailNorm, $digits) {
                $emailMatch = mb_strtolower(trim((string) $r->email)) === $emailNorm;
                $phoneMatch = $digits !== '' && preg_replace('/\D+/', '', (string) $r->phone) === $digits;

                return $emailMatch || $phoneMatch;
            })
            ->values();

        if ($results->isEmpty()) {
            return back()
                ->withInput()
                ->with('ticket_error', "Aucune inscription trouvée pour « {$id} ». Vérifie l'orthographe de ton email/téléphone, ou inscris-toi si ce n'est pas encore fait.");
        }

        return view('public.ticket', [
            'results'    => $results,
            'identifier' => $id,
        ]);
    }
}
