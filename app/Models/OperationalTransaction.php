<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'operational_name', 'price', 'description'
    ];
}
