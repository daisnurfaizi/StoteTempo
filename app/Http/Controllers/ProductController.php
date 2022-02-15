<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\vendor;
use App\Repository\ProductRepository;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Product';
        $category = Category::all();
        $vendor = vendor::whereNull('deleted_at')->get();
        // dd($vendor);
        return view('Pages.Products.products3', [
            'title' => $title,
            'vendor' => $vendor,
            'category' => $category
        ]);
    }

    public function CreateProduct(Request $request)
    {
        // dd($request);
        $productrepository = new ProductRepository;
        $productservice = new ProductService($productrepository);
        return $productservice->newProduct($request);
    }

    public function getProduct()
    {

        $title = 'ListProduct';
        $productrepository = new ProductRepository;
        $productservice = new ProductService($productrepository);
        $products = $productservice->getProduct();
        // dd($products);
        return view('Pages.Products.DashboardProduct', [
            'title' => $title,
            'products' => $products
        ]);
    }

    public function DetailProduk($id)
    {
        $title = 'DetailProduct';
        $productrepository = new ProductRepository;
        $productservice = new ProductService($productrepository);
        $product = $productservice->getProductbyId($id);
        // dd($product);
        return view('Pages.Products.DetailProduct', [
            'title' => $title,
            'products' => $product,
            'id' => $id,
        ]);
    }

    public function addItemProduct(Request $request)
    {
        $productrepository = new ProductRepository;
        $productservice = new ProductService($productrepository);
        return $productservice->addItemDetail($request);
    }
}
