<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opname extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'data' => 'json', // Cast the 'data' attribute as JSON
    ];
}
