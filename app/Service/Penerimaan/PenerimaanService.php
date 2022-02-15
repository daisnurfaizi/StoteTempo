<?php

namespace App\Service\Penerimaan;

use App\Repository\Penerimaan\PenerimaanRepository;

class PenerimaanService
{
    private $PenerimaanRepository;
    public function __construct(PenerimaanRepository $PenerimaanRepository)
    {
        $this->PenerimaanRepository = $PenerimaanRepository;
    }

    public function terimaBarang($nomorinvoice)
    {

        $detailinvoice = $this->PenerimaanRepository->getDetailInvoice($nomorinvoice);
        // insert product detail 
        if (!empty($detailinvoice)) {

            $product_detail = $this->PenerimaanRepository->insertProductDetail($detailinvoice);
            // dd($product_detail);
            if ($product_detail) {
                return back()->with('success', 'Penerimaan barang berhasil');
            } else {
                return back()->with('error', 'Gagal membuat penerimaan barang');
            }
        }

        return back()->with('error', 'Gagal membuat penerimaan barang');
    }
}
