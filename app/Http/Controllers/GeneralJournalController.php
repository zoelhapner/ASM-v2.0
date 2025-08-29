<?php

namespace App\Http\Controllers;

use App\Models\AccountingJournal;
use Illuminate\Http\Request;

class GeneralJournalController extends Controller
{
    public function index(Request $request)
    {
        // ambil input filter (default bulan berjalan)
        $startDate = $request->start_date ?? now()->startOfMonth()->toDateString();
        $endDate   = $request->end_date ?? now()->endOfMonth()->toDateString();

        // query jurnal sesuai periode
        $journals = AccountingJournal::with(['details.account'])
            ->whereBetween('date', [$startDate, $endDate])
            ->orderBy('date')
            ->get();

        return view('journals.general', compact('journals', 'startDate', 'endDate'));
    }
}
