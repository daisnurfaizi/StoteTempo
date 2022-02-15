<?php

namespace App\Service;

use App\Repository\BarterRepository;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginSevice
{
    private $userbarter;
    private $userrepository;
    public function __construct(BarterRepository $userbarter, UserRepository $userrepository)
    {

        $this->userbarter = $userbarter;
        $this->userrepository = $userrepository;
    }

    public function login($request)
    {
        // dd($request->username);
        $userbarter = $this->userbarter->barterUser($request);
        if (!empty($userbarter)) {
            $object = [
                'nik' => $userbarter[0]->nik,
                'password' => $userbarter[0]->pswd,
                'username' => $userbarter[0]->login,
            ];
            $result = (object) $object;
            $user = $this->userrepository->getUser($result);
        }
        if (!empty($userbarter) && !empty($user)) {
            $this->LoginBarter($userbarter, $user);
        } else if (!empty($userbarter) && empty($user)) {
            $finduserbynik = $this->userrepository->findBynik($result);
            if (!empty($finduserbynik)) {
                if ($userbarter[0]->nik == $finduserbynik->nik && $userbarter[0]->login != $finduserbynik->username && $userbarter[0]->pswd != $finduserbynik->password) {
                    echo "Data barter berubah harus di update";
                    $this->updateDataUser($result);
                    $this->LoginBarter($userbarter, $finduserbynik);
                } else if ($userbarter[0]->nik == $finduserbynik->nik && $userbarter[0]->login == $finduserbynik->username && $userbarter[0]->pswd != $finduserbynik->password) {
                    $this->updateDataUser($result);
                } else if ($userbarter[0]->nik == $finduserbynik->nik && $userbarter[0]->login != $finduserbynik->username && $userbarter[0]->pswd == $finduserbynik->password) {
                    echo "Data barter berubah harus di update";
                    $this->updateDataUser($result);
                }
            } else {
                echo "user belum mendapatkan role atau belum di izinkan";
            }
        } else {
            // super admin login
            $finduser = $this->userrepository->findByusername($request);
            if (!empty($finduser)) {
                $permission = $this->userrepository->getPermission($finduser);
                if ($permission->id == 2) {
                    return redirect('dashboard');
                }
                return redirect('login');
            } else {
                return redirect('login');
            }
        }
    }

    public function updateDataUser($data)
    {
        // dd($data);
        if ($this->userrepository->updateUser($data)) {
            return 1;
        }
    }

    public function Auth($request)
    {
        $userbarter = $this->userbarter->barterUser($request);
        if (!empty($userbarter)) {
            $object = [
                'nik' => $userbarter[0]->nik,
                'password' => $userbarter[0]->pswd,
                'username' => $userbarter[0]->login,
            ];
            $result = (object) $object;
            $user = $this->userrepository->getUser($result);
        }
        if (!empty($userbarter) && !empty($user)) {
            return $this->LoginBarter($userbarter, $user);
        } else if (!empty($userbarter) && empty($user)) {
            $finduserbynik = $this->userrepository->findBynik($result);
            if (!empty($finduserbynik)) {
                if ($userbarter[0]->nik == $finduserbynik->nik && $userbarter[0]->login != $finduserbynik->username && $userbarter[0]->pswd != $finduserbynik->password) {
                    if ($this->updateDataUser($result)) {
                        $userupdate = $this->userrepository->findBynik($result);
                        return $this->LoginBarter($userbarter, $userupdate);
                    }
                } else if ($userbarter[0]->nik == $finduserbynik->nik && $userbarter[0]->login == $finduserbynik->username && $userbarter[0]->pswd != $finduserbynik->password) {
                    if ($this->updateDataUser($result)) {
                        $userupdate = $this->userrepository->findBynik($result);
                        return $this->LoginBarter($userbarter, $userupdate);
                    }
                } else if ($userbarter[0]->nik == $finduserbynik->nik && $userbarter[0]->login != $finduserbynik->username && $userbarter[0]->pswd == $finduserbynik->password) {
                    if ($this->updateDataUser($result)) {
                        $userupdate = $this->userrepository->findBynik($result);
                        return $this->LoginBarter($userbarter, $userupdate);
                    }
                }
            } else {
                return redirect('login')->withErrors(['error' => 'error']);
            }
        } else {
            // super admin login
            $finduser = $this->userrepository->findByusername($request);
            // dd($finduser->username);
            if (!empty($finduser)) {
                // dd($finduser->userna);
                // $permission = $this->userrepository->getPermission($finduser);
                if (Auth::attempt(['username' => $finduser->username, 'password' => $request->password, 'role_id' => 2])) {
                    session(['nik' => $finduser->nik]);
                    session(['username' => $finduser->username]);
                    // session(['email' => $finduser[0]->email]);
                    session(['role_id' => $finduser->role_id]);
                    session(['login' => true]);
                    // dd(session()->get('username'));
                    return redirect()->intended('dashboard');
                }
                return redirect('login')->withErrors(['error' => 'error']);
            } else {
                return redirect('login')->withErrors(['error' => 'error']);
            }
        }
    }
    // cek apakah login barter ada di user
    public function LoginBarter($userbarter, $user)
    {
        // dd($user->username);
        if ($userbarter[0]->nik == $user->nik && $userbarter[0]->login == $user->username && $userbarter[0]->pswd == $user->password) {
            // $user->session()->regenerate();
            session(['nik' => $user->nik]);
            session(['username' => $userbarter[0]->login]);
            session(['email' => $userbarter[0]->email]);
            session(['role_id' => $user->role_id]);
            session(['login' => true]);
            // dd($userbarter->session()->regenerate())    ;
            // dd(session()->get('username'));
            return redirect()->intended('dashboard');
            // return redirect('dashboard');
        }
        // echo "gagal";
    }
}
