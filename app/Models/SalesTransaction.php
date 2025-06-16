<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_price', 'transaction_date'
    ];

    public function items()
    {
        return $this->hasMany(SalesTransactionItem::class);
    }
}
