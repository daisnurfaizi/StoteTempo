<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonfile = File::get('database/data/product.json');
        $data = json_decode($jsonfile);
        foreach ($data as $key => $value) {

            Product::create([
                "product_name" => $value->product_name,
            ]);
        }
    }
}
