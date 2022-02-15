<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonfile = File::get('database/data/category.json');
        $data = json_decode($jsonfile);
        foreach ($data as $key => $value) {

            Category::create([
                "Category_name" => $value->Category_name,
            ]);
        }
    }
}
