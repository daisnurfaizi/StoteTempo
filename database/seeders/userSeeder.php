<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'username' => 'admin',
                'password' => bcrypt('D@isd415'),
                'name' => 'dais',
                'Login' => 1,
                'role_id' => 2,
            ]
        );
        User::create(
            [
                'nik' => 'T1791',
                'username' => 'T1791',
                'password' => bcrypt('D@isd415'),
                'name' => 'dais',
                'Login' => 1,
                'role_id' => 3,
            ]
        );
    }
}
