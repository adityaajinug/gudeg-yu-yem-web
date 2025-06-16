<?php

namespace App\Http\Controllers;

use App\Models\SalesTransaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanSalesTransactionController extends Controller
{
     public function export(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;

        $data = SalesTransaction::with('items.menu')
            ->whereBetween('transaction_date', [$start, $end])
            ->get();

        $pdf = Pdf::loadView('pdf.laporan-sales', [
            'transactions' => $data,
            'start' => $start,
            'end' => $end,
        ]);

        return $pdf->stream("laporan_sales_{$start}_to_{$end}.pdf");
    }
}
