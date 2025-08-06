<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'name',
        'quantity',
        'input_date',
    ];
    protected $casts = [
    'input_date' => 'date',
];
}
