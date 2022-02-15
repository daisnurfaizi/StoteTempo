<?php

namespace App\Repository;

use App\Models\vendor;
use Illuminate\Support\Facades\DB;

class VendorRepository
{
    public function save($request)
    {
        $category = vendor::create([
            'vendor_name' => $request->vendor_name
        ]);
        return $category;
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $category = vendor::where('id', $request->id)
                ->update(['vendor_name' => $request->vendor_name]);
            DB::commit();
            return $category;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function deactive($request)
    {
        DB::beginTransaction();
        try {
            $vendor = vendor::where('id', $request->id)
                ->update(['active' => 0]);
            DB::commit();
            return $vendor;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function getVendor()
    {
        $vendor = vendor::where('active', 1)
            ->get();
        return $vendor;
    }
}
