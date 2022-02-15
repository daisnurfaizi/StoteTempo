<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class BarterRepository
{
    public function barterUser($request)
    {
        // dd($request);
        $userbarter = DB::connection('barter')->select("SELECT nik,login,email,pswd from ms00_login where login = '$request->username' and pswd = Password('$request->password')");
        return $userbarter;
    }

    public function getAllUser()
    {
        $userbarters = DB::connection('barter')->select("SELECT  nik,login,email from ms00_login where aktif = 1");
        return $userbarters;
    }
}
