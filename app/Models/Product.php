<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'sku';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'sku',
        'name',
        'price',
    ];
    protected $casts = [
        'price' => 'float',
    ];

    public function purchaseProducts()
    {
        return $this->hasMany(PurchaseProduct::class, 'sku', 'sku');
    }

    public function saleProducts()
    {
        return $this->hasMany(SaleProduct::class, 'sku', 'sku');
    }

    public function getStockAttribute()
    {
        $purchases = $this->purchaseProducts->sum('quantity');
        $sales = $this->saleProducts->sum('quantity');

        return $purchases - $sales;
    }

    public function setSkuAttribute($value)
    {
        $this->attributes['sku'] = strtoupper($value);
    }
}
