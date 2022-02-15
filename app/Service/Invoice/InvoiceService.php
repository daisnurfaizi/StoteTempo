<?php

namespace App\Service\Invoice;

use App\Repository\Invoice\InvoiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceService
{
    public function getInvoice()
    {
        return 'Invoice';
    }

    public function createInvoice(Request $request)
    {
        // dd($request);
        $createinvoice = new InvoiceRepository;
        $invoice = $createinvoice->createInvoice($request);

        if ($invoice) {
            return back()->with('success', 'Invoice berhasil dibuat');
        } else {
            return back()->with('error', 'Gagal membuat Invoice');
        }
    }

    public function updateInvoice(Request $request)
    {
        dd($request);
    }
}
