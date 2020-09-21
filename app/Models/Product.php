<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @var array */
    protected $casts = [
        'created_at' => 'datetime:H:i:s',
    ];

    use HasFactory;
}
