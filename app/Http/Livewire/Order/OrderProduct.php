<?php

namespace App\Http\Livewire\Order;

use App\Models\Product;
use App\Models\Product_details;
use App\Models\vendor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderProduct extends Component
{

    public $OderProducts, $OderProduct, $color, $size, $product_name, $category_id, $vendor_id;
    public $item;
    public $productitems = [];
    public $products;
    public $product;
    public $vendors;
    public $vendor;
    public $items;
    public $Inputs = [];
    public $i = 1;
    public $toltalitem;
    protected $rules = [
        'products' => 'required'
    ];
    public function add($i)
    {
        $i = $this->i + 1;
        $this->i = $i;
        array_push($this->Inputs, $i);
    }
    public function updateing($item)
    {
        $this->toltalitem = $item;
    }
    public function mount()
    {
        $this->products = Product::all();
        $this->vendors = [];
        $this->items = [];
    }

    public function updatingProduct($product)
    {
        // dd($product);
        $this->vendors = DB::select('SELECT DISTINCT vendors.id,vendors.vendor_name FROM vendors JOIN product_details on vendors.id = product_details.vendor_id JOIN products ON product_details.product_id = products.id WHERE products.id = ?', [$product]);
        $this->vendor = $this->vendors[0]->id;
        $this->items = Product_details::where('vendor_id', $this->vendors[0]->id)
            ->where('product_id', $product)
            ->get();
        // dd($this->vendors);
        // dd($this->items);
    }

    public function updatingVendor($vendor)
    {
        // dd($this->product);
        $this->items = Product_details::where('vendor_id', $vendor)
            ->where('product_id', $this->product)
            ->get();
    }
    public function remove($i)
    {
        // dd($i);
        unset($this->Inputs[$i]);
    }
    public function render()
    {
        return view('livewire.order.order-product');
    }

    public function orderProduct()
    {
        $this->validate([
            'products' => 'required',

        ]);
    }
}
