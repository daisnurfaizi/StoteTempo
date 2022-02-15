<?php

namespace App\Http\Livewire;

use App\Models\Product_details;
use App\Repository\ProductRepository;
use App\Service\ProductService;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;

class ProductTable extends LivewireDatatable
{

    public $paramid;

    // public function mount($paramid)
    // {
    //     $this->paramid = $paramid;
    // }


    public function builder()
    {
        return  Product_details::query()->join('products', 'products.id', '=', 'product_details.product_id')
            ->select('product_details.id', 'product_details.color', 'product_details.size', 'product_details.description', 'product_details.harga_perunit', 'product_details.margin', 'product_details.harga_jual', 'product_details.qty_item', 'products.id', 'products.product_name', 'product_details.vendor_id', 'product_details.category_id')
            ->where('products.id', '=', $this->id)
            ->get();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('nomor'),
            Column::name('color')->label('Color'),
            Column::name('size')->label('Size'),
            Column::name('qty')->label('Qty'),

        ];
    }
}
