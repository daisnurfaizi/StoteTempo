<?php

namespace Database\Seeders;

use App\Models\vendor;
use Illuminate\Database\Seeder;

class vendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        vendor::create([
            "vendor_name" => "Tana Tumpa Dara",
        ]);
    }
}
