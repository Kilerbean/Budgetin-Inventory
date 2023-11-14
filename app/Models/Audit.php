<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;
    protected $guarded = ['created_at'];


    public function Barang()
    {
        return $this ->belongsTo(barang::class,'recordid','Catalog_Number')->withdefault();
    }



    public function Income()
    {
        return $this ->belongsTo(Income::class,'recordid','Catalog_Number')->withdefault();
    }


    public function Usage()
    {
        return $this ->belongsTo(Usage::class,'recordid','Catalog_Number')->withdefault();
    }



}
