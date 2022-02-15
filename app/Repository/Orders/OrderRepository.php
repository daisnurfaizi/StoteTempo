<?php

namespace App\Repository\Orders;

use App\Models\Order\Order;
use App\Models\Order\Order_detail;
use App\Models\Order\OrderDetail;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function createOrder($request)
    {
        // dd($request->produk);
        DB::beginTransaction();
        try {
            $order = new Order();
            $order->order_id = $this->generateOrderid();
            $order->save();
            foreach ($request->produk as $key => $insert) {
                // dd($request->jumlahpcs[$key]);
                $saverecord = [
                    'order_id' => $order->order_id,
                    'product_detail_id' => $request->produk[$key],
                    'quantity' => $request->jumlahpcs[$key],
                ];
                // dd($saverecord['product_detail_id']);
                $orderDetails = new OrderDetail;
                $orderDetails->order_id = $order->order_id;
                $orderDetails->product_detail_id = $saverecord['product_detail_id'];
                $orderDetails->quantity = $saverecord['quantity'];
                $orderDetails->save();
            }
            // dd($saverecord);
            $sumqtyitem = OrderDetail::where('order_id', '=', $order->order_id)->sum('quantity');
            // dd($sumqtyitem);
            $updatetotal_qty = Order::where('order_id', '=', $order->order_id)->update(['total_qty' => $sumqtyitem]);
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }
    public function generateOrderid()
    {
        $orderid = 'ORD' . date('YmdHis');
        return $orderid;
    }

    public function cretateorderid()
    {
        $order = new Order();
        $order->order_id = $this->generateOrderid();
        $order->save();

        if ($order) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createorderdetail()
    {
        $orderdetail = new Order_detail();
        $orderdetail->order_id = $this->generateOrderid();
        $orderdetail->product_detail_id = 1;
        $orderdetail->quantity = 1;
        $orderdetail->save();

        if ($orderdetail) {
            return 1;
        } else {
            return 0;
        }
    }
    public function getAll()
    {
        $order = Order::where('invoiced', '=', 0)->get();
        return $order;
    }
}
