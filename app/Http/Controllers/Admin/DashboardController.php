<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total'     => Registration::count(),
            'pending'   => Registration::where('status', 'pending')->count(),
            'confirmed' => Registration::where('status', 'confirmed')->count(),
            'cancelled' => Registration::where('status', 'cancelled')->count(),
            'checked_in' => Registration::whereNotNull('checked_in_at')->count(),
        ];

        $latest = Registration::latest()->limit(8)->get();

        return view('admin.dashboard', compact('stats', 'latest'));
    }
}
