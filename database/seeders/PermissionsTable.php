<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'add user'
        ]);
        Permission::create([
            'name' => 'Create Product'
        ]);

        $admin = Role::where('name', 'admin')->first();
        $admin->permission()->attach([1, 2]);
        $superadmin = Role::where('name', 'super admin')->first();
        $superadmin->permission()->attach([1, 2]);
        $user = Role::where('name', 'user')->first();
        $user->permission()->attach([2]);
    }
}
