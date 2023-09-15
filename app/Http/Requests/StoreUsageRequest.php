<?php

namespace App\Http\Requests;

use App\Models\Income;
use App\Models\barang;
use Illuminate\Foundation\Http\FormRequest;

class StoreUsageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $income = Income::where('no_batch',$this ->no_batch)->first();
        $barang = barang::where('Catalog_Number',$income ->Catalog_Number)->first();
        return [
            'Quantity' => 'max:'.$barang->Quantity,
            'Catalog_Number'=>'required',
            'no_batch'=>'required',
            'Open_By' => 'required',
        ];
    }
}
