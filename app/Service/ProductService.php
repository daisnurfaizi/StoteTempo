<?php

namespace App\Service;

use App\Repository\ProductRepository;
use App\Repository\StockCardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productrepository)
    {
        $this->productRepository = $productrepository;
        // $this->stokcardrepository = $stokcardRepository;
    }

    public function newProduct($request)
    {
        // $rules = [
        //     'product_name' => 'required',
        //     'category_id' => 'required',
        //     'vendor_id' => 'required',
        //     'color.*' => 'required',
        //     'size.*' => 'required',
        // ];

        // $message = [
        //     'required' => ':attribute tidak boleh kosong',
        // ];
        // $validate = Validator::make($request->all(), $rules, $message);
        // if ($validate->fails()) {
        //     return redirect()->back()->withErrors($validate)->withInput($request->all());
        // }

        $product = $this->productRepository->newProduct($request);
        return $product;
    }

    public function getProduct()
    {
        $product = $this->productRepository->showProducts();
        return $product;
    }

    public function getProductbyId($id)
    {
        // dd($id)
        $product = $this->productRepository->getProductDetail($id);
        return $product;
    }

    public function addItemDetail($request)
    {
        // dd($request);
        $product = $this->productRepository->addItemProductDetails($request);
        return $product;
    }
}
