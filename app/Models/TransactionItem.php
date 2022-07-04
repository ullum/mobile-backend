<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'products_id',
        'transaction_id',
        'quantity'
    ];

    // Relasi
    //  transaksi item dan produk
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    // 

}
