<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewItem extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|string|unique:item,name'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Item name is required.',
            'name.string' => 'Invalid Item Name.',
            'name.unique' => 'Item name already exist.'
        ];
    }

}
