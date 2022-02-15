<?php

namespace Tests\Feature;

use App\Repository\Orders\OrderRepository;
use App\Service\Orders\OrderService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_createOrder()
    {
        $orderRepository = new OrderRepository();
        // $orderservice = new OrderService($orderRepository);
        $orderRepository->cretateorderid();
        $this->assertEquals(1, 1);
    }

    public function test_orderdetail()
    {
        $orderRepository = new OrderRepository();
        $orderRepository->createorderdetail();
        $this->assertEquals(1, 1);
    }
}
