<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesTransactionItem extends Model
{
    use HasFactory;

     protected $fillable = [
        'sales_transaction_id', 'menu_id', 'quantity', 'price', 'discount'
    ];

    public function transaction()
    {
        return $this->belongsTo(SalesTransaction::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
