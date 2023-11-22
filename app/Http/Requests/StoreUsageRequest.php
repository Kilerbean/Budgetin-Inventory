<?php

namespace App\Http\Requests;

use App\Models\barang;
use App\Models\Income;
use Illuminate\Validation\Rule;
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
 
        return [
            'Catalog_Number' => ['required', Rule::exists('incomes', 'Catalog_Number')],

            'Quantity' => ['required', 'numeric', 'min:1'],
            'no_batch'=> ['required'],
            'Open_By' =>  ['required'],
            'usage' =>['required'],
        ];
    }
    /**
     * Custom validation messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'Catalog_Number.exists' => 'Catalog Number not found in database.',
            'no_batch.required' => 'The Batch number field is required.',
            'Open_By.required' => 'The Open By  field is required.',

        ];
    }
}
