<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    // เพิ่ม fillable ที่นี่
    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
    ];
}
