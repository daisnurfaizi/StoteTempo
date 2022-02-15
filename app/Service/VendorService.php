<?php

namespace App\Service;

use App\Repository\VendorRepository;
use Illuminate\Http\Request;

class VendorService
{
    private $vendorRepository;
    public function __construct(VendorRepository $vendorRepository)
    {
        $this->vendorRepository = $vendorRepository;
    }

    public function CreateNewVendor($request)
    {
        $vendor = $this->vendorRepository->save($request);
        if ($vendor) {
            return 1;
        }
        return 0;
    }

    public function UpdateVendor($request)
    {
        $vendor = $this->vendorRepository->update($request);
        if ($vendor) {
            return 1;
        }
        return 0;
    }

    public function DeactiveVendor($request)
    {
        $vendor = $this->vendorRepository->deactive($request);
        if ($vendor) {
            return 1;
        }
        return 0;
    }

    public function GetVendor()
    {
        $vendor = $this->vendorRepository->getVendor();
        return $vendor;
    }
}
