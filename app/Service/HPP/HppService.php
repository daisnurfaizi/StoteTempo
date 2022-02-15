<?php

namespace App\Service\HPP;

use App\Models\Hpp\Hpp;
use App\Repository\Hpp\HppRepository;
use Illuminate\Http\Request;

class HppService
{
    private $HppRepository;
    public function __construct(HppRepository $HppRepository)
    {
        $this->HppRepository = $HppRepository;
    }

    public function createHpp(Request $request)
    {
        // dd($request);
        $hpp = $this->HppRepository->createHpp($request);
        if ($hpp) {
            return back()->with('success', 'HPP berhasil dibuat');
        } else {
            return back()->with('error', 'Gagal membuat HPP');
        }
    }

    public function getHpp($productid)
    {
        $hpp = $this->HppRepository->getHpp($productid);
        return  $hpp;
    }
}
