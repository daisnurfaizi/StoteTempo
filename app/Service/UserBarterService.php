<?php

namespace App\Service;

use App\Repository\BarterRepository;

class UserBarterService
{
    private $userbarter;
    public function __construct(BarterRepository $userbarter)
    {
        $this->userbarter = $userbarter;
    }

    public function getUser($request)
    {
        $userbarter = $this->userbarter->barterUser($request);
        return $userbarter;
    }

    public function getAllBarterUser()
    {
        $userbarters = $this->userbarter->getAllUser();
        // dd($userbarters);
        return $userbarters;
    }
}
