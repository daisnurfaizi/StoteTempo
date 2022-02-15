<?php

namespace Tests\Feature;

use App\Models\Product_details;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class penerimaanbarangTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_updateProdukdetail()
    {
        $product_detail = new Product_details();
        $product_detail::where('id', 16)
            ->update([
                'qty_item' => 1,
                'harga_perunit' => (int) 8000.0,
            ]);
        $this->assertTrue(true);
    }
}
