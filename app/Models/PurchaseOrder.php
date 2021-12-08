<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $primaryKey = 'invoice';
    protected $fillable = [
        'invoice',
        'user_id',
        'date'
    ];

//    protected $casts = [
//        'date' => 'Y-m-d',
//    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function purchaseProducts()
    {
        return $this->hasMany(PurchaseProduct::class, 'invoice', 'invoice');
    }

    public function setInvoiceAttribute($value)
    {
        $this->attributes['invoice'] = strtoupper($value);
    }
}
