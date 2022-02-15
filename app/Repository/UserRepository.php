<?php

namespace App\Repository;

use App\Models\Role;
use App\Models\User;

class UserRepository
{
    public function getUser($userbarter)
    {
        // dd($userbarter->nik);
        $user = User::where('nik', '=', $userbarter->nik)
            ->where('username', '=', $userbarter->username)
            ->where('password', '=', $userbarter->password)
            ->first();
        return $user;
    }

    public function findBynik($userbarter)
    {
        $user = User::where('nik', '=', $userbarter->nik)->first();
        return $user;
    }

    public function findByusername($user)
    {
        $user = User::where('username', '=', $user->username)->first();
        return $user;
    }

    public function updateUser($userbarter)
    {
        // dd($userbarter);
        $updateuser = User::where('nik', $userbarter->nik)
            ->update([
                'username' => $userbarter->username,
                'password' => $userbarter->password
            ]);
        if ($updateuser) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getPermission($user)
    {

        $permission = Role::where('id', $user->role_id)->first();
        return $permission;
    }
}
