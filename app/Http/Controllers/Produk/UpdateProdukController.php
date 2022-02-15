<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Repository\ProductRepository;
use App\Repository\Produk\ProdukUpdateRepository;
use App\Service\ProductService;
use App\Service\Produk\ProdukService;
use App\Service\Produk\UpdateProdukService;
use Illuminate\Http\Request;

class UpdateProdukController extends Controller
{
    public function index()
    {

        $title = 'Update Product';
        $productrepository = new ProductRepository;
        $productservice = new ProductService($productrepository);
        $products = $productservice->getProduct();
        // dd($products);
        return view('Pages.Products.UpdateProduct', [
            'title' => $title,
            'products' => $products
        ]);
    }

    public function UpdateProduct($id)
    {
        $title = 'DetailProduct';
        $productrepository = new ProductRepository;
        $productservice = new ProductService($productrepository);
        $product = $productservice->getProductbyId($id);
        // dd($product);
        return view('Pages.Products.UpdateDetailProduct', [
            'title' => $title,
            'products' => $product
        ]);
    }

    public function UpdateProductDetail(Request $request)
    {
        dd($request);
    }
}
