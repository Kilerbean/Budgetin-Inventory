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

    public static function getTotalAmounts()
    {
        return self::select('Material_Code')
            ->selectRaw('SUM(Quantity * packingsize) as totalAmount')
            ->groupBy('Material_Code')
            ->pluck('totalAmount', 'Material_Code');
    }

    public static function getTotalQuantity()
{
    return self::select('Material_Code')
        ->selectRaw('SUM(Quantity) as totalQuantity')
        ->groupBy('Material_Code')
        ->pluck('totalQuantity', 'Material_Code');
}
}
