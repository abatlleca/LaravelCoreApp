<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActuation extends FormRequest
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
            'description' => 'bail|required|string|min:3',
            'origin' => 'bail|required|string|max:255|min:3',
            'ticket_id' => 'bail|required|numeric|exists:tickets,id',
            'isPrivate' => 'bail|required|boolean',
        ];
    }
}
