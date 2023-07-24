<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    use HasFactory;
    protected $guarded = ['created_at'];

    public function Barang()
    {
        return $this ->belongsTo(barang::class,'Catalog_Number','Catalog_Number')->withdefault();
    }
}

