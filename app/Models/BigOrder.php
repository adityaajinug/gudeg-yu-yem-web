<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BigOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'address', 'date', 'description'
    ];
}
