<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Repository\Orders\OrderRepository;
use App\Service\Orders\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        $title = 'Order';
        return view('Pages.Order.Order', [
            'title' => $title,

        ]);
    }

    public function create(Request $request)
    {
        $orderrepository = new OrderRepository();
        $orderService = new OrderService($orderrepository);
        $createorder = $orderService->createOrder($request);
        return $createorder;
    }
}
