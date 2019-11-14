<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenu extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|string|max:255|min:3',
            'route' => 'bail|nullable|string|max:255|min:3',
            'order' => 'bail|required|numeric',
            'parent_id' => 'required|numeric',
            'role' => 'bail|required|string|exists:roles,name',
            'permission' => 'bail|nullable|string|exists:permissions,name',
            'environment' => 'bail|required|string',
            'isActive' => 'bail|required|boolean',
        ];
    }
}
