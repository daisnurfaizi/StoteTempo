<?php

namespace App\Models\Hpp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hpp extends Model
{
    use HasFactory;
    protected $table = 'hpp';
    protected $fillable = [
        'product_detail_id',
        'Nilai_hpp',
        'margin_internal',
        'margin_eksternal',
        'hpp_internal',
        'hpp_eksternal',
    ];
}
