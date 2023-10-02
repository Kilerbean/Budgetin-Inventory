<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorebarangRequest extends FormRequest
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
            'Type_of_Material' => ['required'],
            'Type_of_Budget' => ['required'],
            'Name_of_Material' => ['required'],
            'Catalog_Number' => ['required'],
            'packingsize' => ['required'],
            'packingsize_unit' => ['required'],
            'Manufaktur' => ['required'],
            'Unit' => ['required'],
            'Safety_Stock' => ['required'],
            'Harga' => ['required'],
            'Maximum_Stock' => ['required'],
            'category' => ['required'],
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
            'Harga.required' => 'The Prices field is required.',
            'packingsize.required' => 'The Packing Size field is required.',
            'packingsize_unit.required' => 'The Packing Size Unit field is required.',
            'category.required' => 'The Movement Category field is required.',
        ];
    }
}
