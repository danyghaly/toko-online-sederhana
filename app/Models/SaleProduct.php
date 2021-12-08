<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'sku',
        'quantity',
        'price',
    ];
    protected $casts = [
        'price' => 'float',
    ];

    public function saleOrder()
    {
        return $this->belongsTo(SaleOrder::class, 'invoice','invoice');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'sku', 'sku');
    }

    public function setInvoiceAttribute($value)
    {
        $this->attributes['invoice'] = strtoupper($value);
    }

    public function setSkuAttribute($value)
    {
        $this->attributes['sku'] = strtoupper($value);
    }
}
