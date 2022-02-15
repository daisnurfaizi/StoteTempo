<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'category_id',
        'vendor_id',
        'color',
        'size',
        'description',
        'harga_perunit',
        'margin',
        'harga_jual',
        'qty_item',
    ];
    protected $dates = ['deleted_at'];
}
