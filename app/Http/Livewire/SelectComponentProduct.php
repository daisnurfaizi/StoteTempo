<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Product_details;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SelectComponentProduct extends Component
{
    public $products;
    public $product_details;
    public $product_id;
    public $category;
    public $vendor;
    public $vendor_id;
    public $vendor_name;

    protected $rules = [

        'product_id' => 'required',
    ];

    public function mount()
    {
        $this->products = Product::select('id', 'product_name')->get();


        if ($this->product_id != '') {
            $this->vendor = DB::select('SELECT DISTINCT vendors.id,vendors.vendor_name FROM vendors JOIN product_details on vendors.id = product_details.vendor_id JOIN products ON product_details.product_id = products.id WHERE products.id = ?', [$this->product_id]);
            $this->vendor_name = $this->vendor[0]->vendor_name;
        } else {
            $this->vendor = '';
            $this->vendor_name = '';
        }
    }
    public function onChange($value)
    {
        $this->product_id = $value;
        // if ($this->product_id != '') {
        //     // select distinct vendor_name from product_details where product_id = $this->product_id
        //     $this->vendor = DB::select('SELECT DISTINCT vendors.id,vendors.vendor_name FROM vendors JOIN product_details on vendors.id = product_details.vendor_id JOIN products ON product_details.product_id = products.id WHERE products.id = ?', [$this->product_id]);
        // } else {
        //     $this->vendor = '--pilih--';
        // }
    }
    public function render()
    {

        return view('livewire.select-component-product');
    }
}
