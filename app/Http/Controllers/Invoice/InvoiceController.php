<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Repository\Invoice\InvoiceRepository;
use App\Service\Invoice\InvoiceService;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

class InvoiceController extends Controller
{
    public function index()
    {
        $title = 'Invoice';
        $invoiverepository = new InvoiceRepository();
        $ordernumbers = $invoiverepository->getOrderNumber();
        return view('Pages.Invoice.invoice', [
            'title' => $title,
            'ordernumbers' => $ordernumbers
        ]);
    }

    public function getInvoiceJsonvendor($orderid)
    {
        $invoiverepository = new InvoiceRepository();
        $invoicevendor = $invoiverepository->getInvoiceVendor($orderid);
        return json_encode($invoicevendor);
    }

    public function getInvoiceItem($orderid)
    {
        $invoiverepository = new InvoiceRepository();
        $invoiceitem = $invoiverepository->getInvoiceItem($orderid);
        return json_encode($invoiceitem);
    }

    public function create(Request $request)
    {
        $infoiceservice = new InvoiceService;
        $invoice = $infoiceservice->createInvoice($request);
        return $invoice;
    }

    public function listInvoice()
    {
        $title = 'List Invoice';
        $invoiverepository = new InvoiceRepository();
        $invoices = $invoiverepository->getAllInvoice();
        return view('Pages.Invoice.index', [
            'title' => $title,
            'invoices' => $invoices
        ]);
    }
}
