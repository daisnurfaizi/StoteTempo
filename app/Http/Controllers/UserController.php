<?php

namespace App\Http\Controllers;

use App\Repository\BarterRepository;
use App\Repository\UserRepository;
use App\Service\LoginSevice;
use App\Service\LogoutService;
use App\Service\UserBarterService;
use Illuminate\Http\Request;


class UserController extends Controller
{


    public function Login()
    {
        $object = [
            'username' => 'dais',
            'password' => 'D@isd415',
        ];
        $request = (object) $object;

        $barterrepository = new BarterRepository;
        $userrepository = new UserRepository;
        $user = new LoginSevice($barterrepository, $userrepository);
        return $user->login($request);
    }


    public function userLogin(Request $request)
    {
        $barterrepository = new BarterRepository;
        $userrepository = new UserRepository;
        $user = new LoginSevice($barterrepository, $userrepository);
        // dd($user->login($request));
        return $user->Auth($request);
    }

    public function Logout(Request $request)
    {
        $logout = new LogoutService;
        return $logout->logout($request);
    }

    public function Dashboard()
    {
        $title = 'Dashboard';
        return view('Test', ['title' => $title]);
    }
    public function WhiteListUser()
    {
        $usersbarterRepository = new BarterRepository;
        $usersbarterservice = new UserBarterService($usersbarterRepository);
        $user = $usersbarterservice->getAllBarterUser();
        $title = 'WhiteList';
        return view('Pages.User.index', [
            'userbarters' => $user,
            'title' => $title
        ]);
    }
}
