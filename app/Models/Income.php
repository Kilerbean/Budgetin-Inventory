<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $fillable = [
        'No_PR','Catalog_Number','Type_of_Material','Name_of_Material',
        'Quantity','Unit','Prices','Total','Propose','No_PO','PO_Date','Expire_Date'
        ,'Status'
    ];
    public function Barang()
    {
        return $this ->belongsTo(barang::class,'Catalog_Number','Catalog_Number')->withdefault();
    }
    

}
