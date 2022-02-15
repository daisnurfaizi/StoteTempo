<?php

namespace App\Http\Controllers\Hpp;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repository\Hpp\HppRepository;
use App\Repository\Orders\OrderRepository;
use App\Service\HPP\HppService;
use Illuminate\Http\Request;

class HppController extends Controller
{
    public function Margin()
    {
        $product = Product::select('id', 'product_name')->get();

        $title = 'Margin HPP';
        return view('Pages.Margin.Margin', [
            'title' => $title,
            'products' => $product,

        ]);
    }

    public function getHppJson($product_id)
    {
        $hpprepository = new HppRepository;
        $hppservice = new HppService($hpprepository);
        $hpp = $hppservice->getHpp($product_id);
        return json_encode($hpp);
    }

    public function BuatHpp(Request $request)
    {
        $hpprepository = new HppRepository;
        $hppservice = new HppService($hpprepository);
        $hpp = $hppservice->createHpp($request);
        return $hpp;
    }
}
