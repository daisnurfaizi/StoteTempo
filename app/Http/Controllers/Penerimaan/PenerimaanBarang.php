<?php

namespace App\Http\Controllers\Penerimaan;

use App\Http\Controllers\Controller;
use App\Repository\Invoice\InvoiceRepository;
use App\Repository\Penerimaan\PenerimaanRepository;
use App\Service\Penerimaan\PenerimaanService;
use Illuminate\Http\Request;

class PenerimaanBarang extends Controller
{
    public function index()
    {
        $invoice = new InvoiceRepository();
        $invoicebarang = $invoice->getAllInvoice();
        $title = 'Penerimaan Barang';
        return view('Pages.Penerimaan.PenerimaanBarang', [
            'title' => $title,
            'invoices' => $invoicebarang
        ]);
    }

    public function TerimaBarang($nomorinvoice)
    {
        // dd($nomorinvoice);
        $terimabarangRepository = new PenerimaanRepository();
        $terimabarangService = new PenerimaanService($terimabarangRepository);
        $terimabarang = $terimabarangService->terimaBarang($nomorinvoice);
        return $terimabarang;
    }
}
