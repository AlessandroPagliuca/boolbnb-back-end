<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApartmentRequest extends FormRequest
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
            'main_img' => 'required|min:3|max:255',
            'rooms' => 'required|min:1|max:6',
            'beds' => 'required|min:1|max:10',
            'bathrooms' => 'required|min:1|max:3',
            'square_meters' => 'required|min:10|max:500',
            'address' => 'requied|min:3|max:255',
            'latitude' => 'required|min:-90|max:90',
            'longitude' => 'required|min:-180|max:180',
            'visible' => 'nullable',
            'price' => 'required|numeric|min:1|max:99999|regex:/^\d+(\.\d{2})?$/',
            'user_id' => 'nullable|exists:users,id',
        ];
    }
}

// 'title' => [
//     'required',
//     'max:100',
//     'min:3',
//     Rule::unique('projects')->ignore($this->project),
// ],
