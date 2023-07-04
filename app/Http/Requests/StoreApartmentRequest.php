<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100|min:3',
            'description' => 'required|min:10',
            'main_img' => 'required|image|max:2048',
            'rooms' => 'required|min:1|max:6',
            'beds' => 'required|min:1|max:10',
            'bathrooms' => 'required|min:1|max:3',
            'square_meters' => 'required|min:0|max:500',
            'address' => 'required|min:3|max:255',
            'city' => 'required|min:3|max:100',
            'country' => 'required|min:1|max:100',
            'zipcode' => 'required|min:1|max:100',
            'visible' => 'nullable|boolean',
            'price' => 'required|numeric|min:1|max:99999|regex:/^\d+(\.\d{2})?$/',
            'user_id' => 'nullable|exists:users,id',
        ];
    }
}