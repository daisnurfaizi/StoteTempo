<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokCard extends Model
{
    use HasFactory;
    protected $table = 'stock_card';
    protected $fillable = ['product_id', 'product_detail_id', 'qty_in', 'qty_out'];
}
