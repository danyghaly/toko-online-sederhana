<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    use HasFactory;

    protected $primaryKey = 'invoice';
    protected $fillable = [
        'invoice',
        'user_id',
        'date',
        'approve',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeApprove($query)
    {
        $query->where('approve', true);
    }

    public function saleProducts()
    {
        return $this->hasMany(SaleProduct::class, 'invoice', 'invoice');
    }
}
