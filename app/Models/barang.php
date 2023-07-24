<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $guarded = ['created_at'];
    public function Income()
    {
        return $this ->hasMany(Income::class,'Catalog_Number','Catalog_Number')->withdefault();
    }
}
