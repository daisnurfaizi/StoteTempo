<?php

namespace App\Service\Produk;

use App\Repository\Produk\ProdukUpdateRepository;
use App\Repository\StockCardRepository;

interface ProdukServiceInterface
{
    public function getProductDetail();
    public function UpdateProductDetail($id);
    public function UpdateProductName($id);
}

class UpdateProdukService implements ProdukServiceInterface
{
    private $productRepository;
    private $stockCardRepository;
    public function __construct(ProdukUpdateRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        // $this->stockCardRepository = $stockCardRepository;
    }
    public function getProductDetail()
    {
        $product = $this->productRepository->getProductDetail();
        return $product;
    }

    public function UpdateProductDetail($id)
    {
        $product = $this->productRepository->UpdateProductDetail($id);
        return $product;
    }
    public function UpdateProductName($id)
    {
        $product = $this->productRepository->UpdateProductName($id);
        return $product;
    }
}
