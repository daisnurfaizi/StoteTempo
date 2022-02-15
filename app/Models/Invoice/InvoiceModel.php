<?php

namespace App\Models\Invoice;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    use HasFactory;
    protected $table = 'table_invoice';
    protected $fillable = [
        'invoice_id',
        'orderid',
        'totalharga',
        'ongkir',
        'totalhargaakhir',
        'totalbarang',
        'status',
        'discount',

    ];
    protected $date = [
        'deleted_at',
    ];
}
