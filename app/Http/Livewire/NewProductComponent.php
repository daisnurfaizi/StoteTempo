<?php

namespace App\Http\Livewire;

use App\Repository\ProductRepository;
use App\Service\ProductService;
use Illuminate\Http\Request;
use Livewire\Component;

class NewProductComponent extends Component
{
    public $Products, $Product, $color, $size, $product_name, $category_id, $vendor_id;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

    public function add($i)
    {

        $i = $this->i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }
    public function remove($i)
    {
        // dd($i);
        unset($this->inputs[$i]);
    }
    public function mount($category, $vendor)
    {
        $this->category = $category;
        $this->vendor = $vendor;
    }
    public function resetInputfield()
    {
        $this->product_name = '';
        $this->color = '';
        $this->size = '';
        $this->category_id = '';
        $this->vendor_id = '';
    }
    public function store()
    {

        $validatedDate = $this->validate(
            [
                'product_name' => 'required|unique:products',
                'category_id' => 'required',
                'vendor_id' => 'required',
                'color.0' => 'required',
                'size.0' => 'required',
                'color.*' => 'required',
                'size.*' => 'required',
            ],
            [
                'product_name.required' => 'Nama Produk Tidak Boleh kosong',
                'product_name.unique' => 'Nama Produk Sudah ada Silahkan di cek kembali',
                'category_id.required' => 'Kategori Tidak Boleh kosong',
                'vendor_id.required' => 'Vendor Tidak Boleh kosong',
                'color.0.required' => 'Harus di isi jika tidak ada isi dengan (-)',
                'size.0.required' => 'Harus di isi jika tidak ada isi dengan (-)',
                'color.*.required' => 'Harus di isi jika tidak ada isi dengan (-)',
                'size.*.required' => 'Harus di isi jika tidak ada isi dengan (-)',
            ]
        );

        // dd($this->color);
        $data = [
            'product_name' => $this->product_name,
            'category_id' => $this->category_id,
            'vendor_id' => $this->vendor_id,
            'color' => $this->color,
            'size' => $this->size,
        ];
        $request = (object) $data;
        $productrepository = new ProductRepository;
        $productservice = new ProductService($productrepository);
        $productservice->newProduct($request);
        $this->inputs = [];
        $this->resetInputfield();
        session()->flash('message', 'Produk ' . $this->product_name . ' Berhasil Ditambahkan');
    }
    public function render()
    {
        return view('livewire.new-product-component');
    }
}
