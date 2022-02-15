<?php

namespace Tests\Feature;

use App\Repository\Orders\OrderRepository;
use App\Service\Orders\OrderService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class createOrder extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_CreateOrder()
    {
        $orderrepository = new OrderRepository();
        $orderrepository->cretateorderid();
        $this->assertEquals(1, 1);
    }
}
