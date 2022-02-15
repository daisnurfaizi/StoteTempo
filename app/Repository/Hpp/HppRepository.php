<?php

namespace App\Repository\Hpp;

use App\Models\Hpp\Hpp;
use App\Models\Product_details;
use Illuminate\Support\Facades\DB;

class HppRepository
{
    public function getHpp($productid)
    {
        $hpp = Hpp::join('product_details', 'hpp.product_detail_id', '=', 'product_details.id')
            ->join('products', 'product_details.product_id', '=', 'products.id')
            ->select('products.product_name', 'hpp.Nilai_hpp', 'hpp.product_detail_id')
            ->where('products.id', $productid)
            ->get();
        return $hpp;
    }
    public function createHpp($request)
    {
        // dd($request);
        DB::beginTransaction();
        try {
            foreach ($request->product_detailid as $key => $value) {
                $updatehpp = Hpp::where('product_detail_id', $request->product_detailid[$key])->update([
                    'margin_internal' => $request->margin_internal[$key],
                    'margin_eksternal' => $request->margin_eksternal[$key],
                    'hpp_internal' => $request->margin_internal[$key] + $request->hpp[$key],
                    'hpp_eksternal' => $request->margin_eksternal[$key] + $request->hpp[$key],
                ]);

                // update product_detail
                $updateproductdetail = Product_details::where('id', $request->product_detailid[$key])->update([
                    'harga_jual' => $request->margin_internal[$key] + $request->hpp[$key],
                    'harga_jual_eksternal' => $request->margin_eksternal[$key] + $request->hpp[$key],
                    'margin' => $request->margin_internal[$key],
                    'margin_eksternal' => $request->margin_eksternal[$key],
                ]);
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    public function updateHpp($request, $product_detail_id)
    {
        $hpp = Hpp::where('product_detail_id', $product_detail_id)->update($request);
        return $hpp;
    }
}
