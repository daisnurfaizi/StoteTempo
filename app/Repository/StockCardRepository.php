<?php

namespace App\Repository;

use App\Models\StokCard;

class StockCardRepository
{
    public function save($request)
    {
        $stockCard = new StokCard();
        $stockCard->product_id = $request->product_id;
        $stockCard->product_detail_id = $request->product_detail_id;
        $stockCard->qty_in = $request->qty_in;
        $stockCard->qty_out = $request->qty_out;
        $stockCard->save();
    }
}
