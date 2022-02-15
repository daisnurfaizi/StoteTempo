<?php

namespace App\Service\Orders;

use App\Repository\Orders\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderService
{
    private $orderRepository;
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }



    public function createOrder(Request $request)
    {
        $rules = [
            'product' => 'required',
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
        ];
        $validate = Validator::make($request->all(), $rules, $message);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput($request->all());
        }
        $order = $this->orderRepository->createOrder($request);
        if ($order) {
            return back()->with('success', 'Order berhasil dibuat');
        } else {
            return back()->with('error', 'Gagal membuat order');
        }
    }
}
