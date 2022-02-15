<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateNewProduct extends Component
{
    public $accounts, $account, $username, $account_id;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }
    public function remove($i)
    {
        // dd($i);
        unset($this->inputs[$i]);
    }






    public function render()
    {
        // $data = Account::all();
        return view('livewire.create-new-product');
    }
}
