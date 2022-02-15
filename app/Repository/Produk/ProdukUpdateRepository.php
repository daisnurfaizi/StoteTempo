<?php

namespace App\Repository\Produk;

use App\Models\Product;

class ProdukUpdateRepository
{
    public function getProductDetail()
    {
        $product = Product::join('product_details', 'products.id', '=', 'product_details.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'product_details.*', 'categories.name as category_name')
            ->get();

        return $product;
    }

    public function UpdateProductDetail($id)
    {
        $product = Product::join('product_details', 'products.id', '=', 'product_details.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'product_details.*', 'categories.name as category_name')
            ->where('products.id', $id)
            ->first();

        return $product;
    }

    public function UpdateProductName($id)
    {
        $product = Product::join('product_details', 'products.id', '=', 'product_details.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'product_details.*', 'categories.name as category_name')
            ->where('products.id', $id)
            ->first();

        return $product;
    }
}
