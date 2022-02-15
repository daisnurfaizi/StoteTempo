<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetailModel extends Model
{
    use HasFactory;

    protected $table = 'table_invoice_detail';
    protected $fillable = [
        'invoice_id',
        'order_id',
        'productid',
        'product_details_id',
        'harga',
        'qty',
        'discount',
        'totalharga',

    ];

    protected $date = [
        'deleted_at',
    ];
}
