<?php

namespace App\Repository\Penerimaan;

use App\Models\Hpp\Hpp;
use App\Models\Invoice\InvoiceDetailModel;
use App\Models\Invoice\InvoiceModel;
use App\Models\Product;
use App\Models\Product_details;
use Illuminate\Support\Facades\DB;

class PenerimaanRepository
{
    public function getDetailInvoice($noinvoice)
    {
        $detailinfoice = InvoiceDetailModel::where('invoice_id', $noinvoice)->get();
        return $detailinfoice;
    }

    public function insertProductDetail($detailinvoice)
    {
        // dd($detailinvoice);

        DB::beginTransaction();
        try {
            foreach ($detailinvoice as $detail) {
                // dd($detail->hargasatuan);
                Product_details::where('id', $detail->product_details_id)
                    ->update([
                        'qty_item' => $detail->qty,
                        'harga_perunit' => $detail->hargasatuan,
                    ]);
                // hpp
                $hpp = Hpp::where('product_detail_id', $detail->product_details_id)->first();
                if (empty($hpp)) {
                    $hpp = Hpp::create([
                        'product_detail_id' => $detail->product_details_id,
                    ]);
                }
            }
            // rumus total harga perunit + (ongkir/totalitem)
            $ongkir = InvoiceModel::select('ongkir')->where('invoice_id', $detailinvoice[0]->invoice_id)->first();
            $sumqtyitem = Product_details::where('product_id', $detailinvoice[0]->product_id)->sum('qty_item');
            $sumharga = Product_details::where('product_id', $detailinvoice[0]->product_id)->sum('harga_perunit');
            // dd($sumqtyitem);
            $ongkirperitem = 0;
            if ($ongkir->ongkir != 0) {
                $ongkirperitem = ($ongkir->ongkir / $sumqtyitem);
                foreach ($detailinvoice as $detail) {
                    Hpp::where('product_detail_id', $detail->product_details_id)
                        ->update([
                            'Nilai_hpp' => $ongkirperitem + $detail->hargasatuan,
                        ]);
                }
            } else {
                foreach ($detailinvoice as $detail) {
                    Hpp::where('product_detail_id', $detail->product_details_id)
                        ->update([
                            'Nilai_hpp' => $detail->hargasatuan,
                        ]);
                }
            }
            $updateproduk = Product::where('id', $detailinvoice[0]->product_id)
                ->update([
                    'qty_product' => (int)$sumqtyitem,
                ]);
            $updatestatusreceive = InvoiceModel::where('invoice_id', $detailinvoice[0]->invoice_id)
                ->update([
                    'status_receive' => 1,
                ]);
            // insert hpp


            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }
}
