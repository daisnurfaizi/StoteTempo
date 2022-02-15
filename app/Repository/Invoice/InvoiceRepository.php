<?php

namespace App\Repository\Invoice;

use App\Models\Invoice\InvoiceDetailModel;
use App\Models\Invoice\InvoiceModel;
use App\Models\Order\Order;
use App\Models\Order\OrderDetail;
use Illuminate\Support\Facades\DB;

class InvoiceRepository
{
    public function invoiceid()
    {
    }

    public function getOrderNumber()
    {
        $ordernumber = Order::select('order_id')->where('invoiced', 0)->whereNull('deleted_at')->get();
        return $ordernumber;
    }

    public function getInvoiceVendor($orderid)
    {
        $ordervendor = OrderDetail::join('product_details', 'product_details.id', '=', 'order_details.product_detail_id')
            ->join('vendors', 'vendors.id', '=', 'product_details.vendor_id')
            ->where('order_details.order_id', $orderid)
            ->select('vendors.vendor_name')->distinct()
            ->get();
        // $invoicevendor = DB::query("SELECT DISTINCT vendors.vendor_name from order_details JOIN product_details ON order_details.product_detail_id = product_details.id JOIN vendors ON product_details.vendor_id = vendors.id WHERE order_details.order_id = ?", [$orderid]);
        return json_decode($ordervendor);
    }

    public function getInvoiceItem($orderid)
    {
        $itemorder = OrderDetail::join('product_details', 'product_details.id', '=', 'order_details.product_detail_id')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->where('order_details.order_id', '=', $orderid, 'and')
            ->where('order_details.invoiced', '=', 0)
            ->select('order_details.quantity', 'products.id', 'product_details.id as product_details_id', 'products.product_name', 'product_details.size', 'product_details.color')
            ->get();
        return $itemorder;
    }

    public function createInvoice($request)
    {

        DB::beginTransaction();
        try {
            $invoice = new InvoiceModel;
            $invoice->invoice_id = $this->gererateInvoiceID();
            $invoice->orderid = $request->product;
            $invoice->ongkir = $request->ongkoskirim;
            $invoice->save();
            foreach ($request->color as $key => $insert) {
                $invoicedetail = new InvoiceDetailModel;
                $invoicedetail->invoice_id = $invoice->invoice_id;
                $invoicedetail->order_id = $request->product;
                $invoicedetail->product_id = $request->produkid[$key];
                $invoicedetail->product_details_id = $request->produk_detail_id[$key];
                $invoicedetail->qty = $request->qty[$key];
                $invoicedetail->hargasatuan = $request->Hargasatuan[$key];
                $invoicedetail->totalharga = $request->totalhargasatuan[$key];
                $invoicedetail->save();
            }

            $totalbarang = InvoiceDetailModel::where('invoice_id', $invoice->invoice_id)->sum('qty');
            $totalhargabarang = InvoiceDetailModel::where('invoice_id', $invoice->invoice_id)->sum('totalharga');
            $updateInvoice = InvoiceModel::where('invoice_id', $invoice->invoice_id)->update(
                [
                    'totalbarang' => $totalbarang,
                    'totalharga' => $totalhargabarang
                ]
            );
            $updateInvoicedOrder = Order::where('order_id', $request->product)->update(['invoiced' => 1]);
            $updateInvoiceOrderDetail = OrderDetail::where('order_id', $request->product)->update(['invoiced' => 1]);
            // hpp

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }
    public function getinvoiceNumberid()
    {
        $invoice = InvoiceModel::select('invoice_id')->whereNull('deleted_at')->get();
        return $invoice;
    }

    public function gererateInvoiceID()
    {
        $invoiceid = 'INV' . date('Ymd') . sprintf('%04d', InvoiceModel::count() + 1);
        return $invoiceid;
    }

    public function getAllInvoice()
    {
        $invoice  = InvoiceModel::join('table_invoice_detail', 'table_invoice_detail.invoice_id', '=', 'table_invoice.invoice_id')
            ->join('product_details', 'product_details.id', '=', 'table_invoice_detail.product_details_id')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->join('vendors', 'vendors.id', '=', 'product_details.vendor_id')
            ->select('table_invoice.*', 'products.product_name', 'vendors.vendor_name', 'table_invoice.totalbarang', 'table_invoice.totalharga')
            ->where('table_invoice.status_receive', '=', 0)
            ->distinct()->get();
        return $invoice;
    }

    public function getInvoice($invoiceid)
    {
        $invoice  = InvoiceDetailModel::where('invoice_id', $invoiceid)->get();
        return $invoice;
    }
}
