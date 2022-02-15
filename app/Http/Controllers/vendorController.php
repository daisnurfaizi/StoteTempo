<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\VendorRepository;
use App\Service\CategoryService;
use App\Service\ProductService;
use App\Service\VendorService;
use Illuminate\Http\Request;

class vendorController extends Controller
{
    public function invoice()
    {
        $categoryRepository = new CategoryRepository();
        $categoryService = new CategoryService($categoryRepository);
        $title = 'Invoice';
        $category = $categoryService->getCategory();
        $vendorRepository = new VendorRepository();
        $vendorService = new VendorService($vendorRepository);
        $vendor = $vendorService->GetVendor();
        $productRepository = new ProductRepository();
        $productService = new ProductService($productRepository);
        $product = $productService->getProduct();


        return view('Pages.Vendor.invoice', [
            'title' => $title,
            'category' => $category,
            'vendor' => $vendor,
            'product' => $product
        ]);
    }
}
