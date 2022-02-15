<?php

namespace App\Repository;

use App\Models\Product;
use App\Models\Product_details;
use App\Models\StokCard;
use Illuminate\Support\Facades\DB;
use Throwable;

class ProductRepository
{
    public function save($request)
    {
        DB::beginTransaction();
        try {

            $product = new Product;
            $product->product_name = $request->product_name;
            $product->qty_product = 0;
            $product->save();
            foreach ($request->color as $key => $insert) {
                $saveRecord = [
                    'product_id' => $product->id,
                    'category_id' => $request->category_id,
                    'vendor_id' => $request->vendor_id,
                    'color' => $request->color[$key],
                    'size' => $request->size[$key],
                    'description' => $request->description[$key],
                    'harga_perunit' => $request->harga[$key],
                    'margin' => $request->margin[$key],
                    'harga_jual' => $request->hargajual[$key],
                    'qty_item' => $request->jumlahitem[$key],
                ];
                $product_details = new Product_details;
                $product_details->product_id = $saveRecord['product_id'];
                $product_details->category_id = $saveRecord['category_id'];
                $product_details->vendor_id = $saveRecord['vendor_id'];
                $product_details->color = $saveRecord['color'];
                $product_details->size = $saveRecord['size'];
                $product_details->description = $saveRecord['description'];
                $product_details->harga_perunit = $saveRecord['harga_perunit'];
                $product_details->margin = $saveRecord['margin'];
                $product_details->harga_jual = $saveRecord['harga_jual'];
                $product_details->qty_item = $saveRecord['qty_item'];
                $product_details->save();
                DB::table('stock_card')->insert([
                    'product_id' => $product->id,
                    'product_detail_id' => $product_details->id,
                    'qty_in' => $request->jumlahitem[$key],
                    'qty_out' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
            $sumqtyitem = Product_details::where('product_id', $product->id)->sum('qty_item');
            $product->qty_product = $sumqtyitem;
            $product->save();
            DB::commit();
            return back();
        } catch (Throwable $e) {
            DB::rollBack();
            return $e;
        }
    }
    // buat produk baru
    public function newProduct($request)
    {
        DB::beginTransaction();
        try {

            $product = new Product;
            $product->product_name = $request->product_name;
            $product->qty_product = 0;
            $product->save();
            foreach ($request->color as $key => $insert) {
                $saveRecord = [
                    'product_id' => $product->id,
                    'category_id' => $request->category_id,
                    'vendor_id' => $request->vendor_id,
                    'color' => $request->color[$key],
                    'size' => $request->size[$key],
                ];
                $product_details = new Product_details;
                $product_details->product_id = $saveRecord['product_id'];
                $product_details->category_id = $saveRecord['category_id'];
                $product_details->vendor_id = $saveRecord['vendor_id'];
                $product_details->color = $saveRecord['color'];
                $product_details->size = $saveRecord['size'];
                $product_details->save();
                DB::table('stock_card')->insert([
                    'product_id' => $product->id,
                    'product_detail_id' => $product_details->id,
                    'qty_out' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
            DB::commit();
            return back();
        } catch (Throwable $e) {
            DB::rollBack();
            return $e;
        }
    }
    public function update($request)
    {
        DB::beginTransaction();
        try {
            $product = Product::find($request->id);
            $product->product_name = $request->product_name;
            $product->save();
            $product_details = Product_details::where('product_id', $request->id)->get();
            foreach ($product_details as $key => $value) {
                $value->delete();
            }
            foreach ($request->color as $key => $insert) {
                $saveRecord = [
                    'product_id' => $product->id,
                    'category_id' => $request->category_id,
                    'vendor_id' => $request->vendor_id,
                    'color' => $request->color[$key],
                    'size' => $request->size[$key],
                    'description' => $request->description[$key],
                    'harga_perunit' => $request->harga[$key],
                    'margin' => $request->margin[$key],
                    'harga_jual' => $request->hargajual[$key],
                    'qty_item' => $request->jumlahitem[$key],
                ];
                DB::table('product_details')->insert($saveRecord);
            }
            DB::commit();
            return back();
        } catch (Throwable $e) {
            DB::rollBack();
            return 'failed';
        }
    }

    public function showProduct($request)
    {
        $product = Product::where('id', $request->id)->first();
        $product_details = Product_details::where('product_id', $request->id)->get();
        return response()->json([
            'product' => $product,
            'product_details' => $product_details
        ]);
    }

    public function Softdelete($request)
    {
        DB::beginTransaction();
        try {
            $product = Product::find($request->id);
            $product->delete();
            $product_details = Product_details::where('product_id', $request->id)->get();
            foreach ($product_details as $key => $value) {
                $value->delete();
            }
            DB::commit();
            return back();
        } catch (Throwable $e) {
            DB::rollBack();
            return 'failed';
        }
    }

    public function getProductbyCategory()
    {
        // inner join produtcs and product_details and category
    }

    public function getProduct($request)
    {
        $product = Product::where('id', $request->id)->first();
        $product_details = Product_details::where('product_id', $request->id)->get();
        return [
            'product' => $product->product_name,
            'product_details' => $product_details
        ];
    }
    // {
    //     // inner join product_details where product_details.product_id = product.id
    //     $product = Product::join('product_details', 'product_details.product_id', '=', 'products.id')
    //         ->select('products.id', 'products.qty_product', 'product_details.color', 'product_details.size', 'product_details.description', 'product_details.harga_perunit', 'product_details.margin', 'product_details.harga_jual', 'product_details.qty_item')
    //         ->get();
    //     return $product;
    // }

    public function getProductbyID($request)
    {
        $product = Product::where('id', $request->id)->first();
        $product_details = Product_details::where('product_id', $request->id)->get();
        return response()->json([
            'product_details' => $product_details
        ]);
    }

    // inner join product_details where product_details.product_id = product.id
    //     $product = Product::join('product_details', 'product_details.product_id', '=', 'product.id')
    //         ->select('product.id', 'product.product_name', 'product.qty_product', 'product_details.color', 'product_details.size', 'product_details.description', 'product_details.harga_perunit', 'product_details.margin', 'product_details.harga_jual', 'product_details.qty_item')
    //         ->where('product.id', $id)
    //         ->get();
    //     return response()->json($product);
    // }

    public function showProducts()
    {
        $product = Product::all();
        return $product;
    }

    public function getProductDetail($id)
    {
        $product_details = Product_details::join('products', 'products.id', '=', 'product_details.product_id')
            ->join('hpp', 'hpp.product_detail_id', '=', 'product_details.id')
            ->select(
                'product_details.id',
                'product_details.color',
                'product_details.size',
                'product_details.description',
                'product_details.harga_perunit',
                'product_details.margin',
                'product_details.margin_eksternal',
                'product_details.harga_jual_eksternal',
                'product_details.harga_jual',
                'product_details.qty_item',
                'products.id',
                'products.product_name',
                'product_details.vendor_id',
                'product_details.category_id',
                'hpp.Nilai_hpp'
            )
            ->where('products.id', '=', $id)
            ->get();
        return $product_details;
    }


    public function addItem($request)
    {
        DB::beginTransaction();
        try {
            $product = Product::find($request->id);
            $product_details = Product_details::where('product_id', $request->id)->get();
            foreach ($product_details as $key => $value) {
                $value->delete();
            }
            foreach ($request->color as $key => $insert) {
                $saveRecord = [
                    'product_id' => $product->id,
                    'category_id' => $request->category_id,
                    'vendor_id' => $request->vendor_id,
                    'color' => $request->color[$key],
                    'size' => $request->size[$key],
                    'description' => $request->description[$key],
                    'harga_perunit' => $request->harga[$key],
                    'margin' => $request->margin[$key],
                    'harga_jual' => $request->hargajual[$key],
                    'qty_item' => $request->jumlahitem[$key],
                ];
                DB::table('product_details')->insert($saveRecord);
            }
            DB::commit();
            return back();
        } catch (Throwable $e) {
            DB::rollBack();
            return 'failed';
        }
    }

    public function addItemProductDetails($request)
    {
        // dd($request);
        DB::beginTransaction();
        try {
            $product_details = Product_details::create([
                'product_id' => $request->product_id,
                'category_id' => $request->category_id,
                'vendor_id' => $request->vendor_id,
                'color' => $request->color,
                'size' => $request->size,
                'description' => $request->description,
                'harga_perunit' => $request->harga,
                'margin' => $request->margin,
                'harga_jual' => $request->hargajual,
                'qty_item' => $request->jumlahitem,
            ]);

            $sumqtyitem = Product_details::where('product_id', $request->product_id)->sum('qty_item');
            $product = Product::find($request->product_id);
            $product->qty_product = $sumqtyitem;
            $product->save();
            DB::table('stock_card')->insert([
                'product_id' => $request->product_id,
                'product_detail_id' => $product_details->id,
                'qty_in' => $request->qty_item,
                'qty_out' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            DB::commit();
            return back();
        } catch (Throwable $e) {
            DB::rollBack();
            return $e;
        }
    }
    public function additemProduk($request)
    {
        DB::beginTransaction();
        try {
            $product_details = Product_details::create([
                'product_id' => $request->product_id,
                'category_id' => $request->category_id,
                'vendor_id' => $request->vendor_id,
                'color' => $request->color,
                'size' => $request->size,
                'description' => $request->description,
                'qty_item' => $request->jumlahitem,
            ]);

            $sumqtyitem = Product_details::where('product_id', $request->product_id)->sum('qty_item');
            $product = Product::find($request->product_id);
            $product->qty_product = $sumqtyitem;
            $product->save();
            DB::table('stock_card')->insert([
                'product_id' => $request->product_id,
                'product_detail_id' => $product_details->id,
                'qty_in' => $request->qty_item,
                'qty_out' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            DB::commit();
            return back();
        } catch (Throwable $e) {
            DB::rollBack();
            return $e;
        }
    }
    // update by ajax
    public function updateItem($request)
    {
        if ($request->ajax()) {
            DB::beginTransaction();
            try {
                $product_details = Product_details::find($request->id);
                $product_details->color = $request->color;
                $product_details->size = $request->size;
                $product_details->description = $request->description;
                $product_details->harga_perunit = $request->harga;
                $product_details->margin = $request->margin;
                $product_details->harga_jual = $request->hargajual;
                $product_details->qty_item = $request->jumlahitem;
                $product_details->save();
                DB::commit();
                return response()->json([
                    'success' => 'success'
                ]);
            } catch (Throwable $e) {
                DB::rollBack();
                return response()->json([
                    'error' => 'error'
                ]);
            }
        }
    }
}
