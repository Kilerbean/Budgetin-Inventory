<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class financial extends Model
{
    use HasFactory;
    protected $guarded = ['created_at'];

    public function budget()
    {
        return $this ->hasMany(Income::class,'Type_of_Budget','Type_of_Budget')->withdefault();
}

}