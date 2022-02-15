<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\OrderDetail;
use App\Models\Product;
use App\Models\Product_details;
use App\Repository\Orders\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderItem extends Controller
{
    public function getProductdetaiitem($id)
    {
        $productdetailitem  = Product_details::join('products', 'products.id', '=', 'product_details.product_id')
            ->join('categories', 'categories.id', '=', 'product_details.category_id')
            ->where('products.id', $id)
            ->select('product_details.*', 'products.product_name', 'categories.category_name')
            ->get();
        return $productdetailitem->toJson();
    }

    public function OrderProduk()
    {
        $title = 'Order';
        $order = new OrderRepository();
        $order = $order->getAll();
        $product = Product::select('id', 'product_name')->get();
        return view('Pages.Order.Order', [
            'products' => $product,
            'title' => $title,
            'orders' => $order,
        ]);
    }

    // vendor json

    public function getVendorJson($product)
    {

        // $vendor =  DB::table('order_details')->join('product_details', 'product_details.id', '=', 'order_details.product_detail_id')
        //     ->join('vendors', 'vendors.id', '=', 'product_details.vendor_id')
        //     ->where('order_details.order_id', $product)
        //     ->select('vendors.vendor_name')->distinct()
        //     ->get();
        // $vendor = DB::query('SELECT DISTINCT vendors.id,vendors.vendor_name FROM vendors JOIN product_details on vendors.id = product_details.vendor_id JOIN products ON product_details.product_id = products.id WHERE products.id = ?', [$product]);
        // $vendor = OrderDetail::join('product_details', 'product_details.id', '=', 'order_details.product_detail_id')
        //     ->join('vendors', 'vendors.id', '=', 'product_details.vendor_id')
        //     ->where('order_details.order_id', $product)
        //     ->select('vendors.vendor_name')->distinct()
        //     ->get();

        $vendor = Product_details::join('vendors', 'vendors.id', '=', 'product_details.vendor_id')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->where('product_details.product_id', $product)
            ->select('vendors.vendor_name')->distinct()
            ->get();
        return json_encode($vendor);
    }
}
