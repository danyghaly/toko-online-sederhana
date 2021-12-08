<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseProduct extends Model
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

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'invoice','invoice');
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
