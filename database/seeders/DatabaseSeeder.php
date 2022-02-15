<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTable::class);
        $this->call(userSeeder::class);
        // $this->call(productSeeder::class);
        $this->call(categorySeeder::class);
        $this->call(vendorSeeder::class);
    }
}
