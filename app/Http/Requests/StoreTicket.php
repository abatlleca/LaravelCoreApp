<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicket extends FormRequest
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
            'title' => 'bail|required|string|max:255|min:3',
            'priority' => 'bail|required|numeric',
            'origin' => 'bail|required|string|max:255|min:3',
            'customer_id' => 'bail|required|numeric|exists:customers,id',
            'status_id' => 'bail|required|numeric|exists:status,id',
            'isPrivate' => 'bail|required|boolean',
            'description' => 'bail|required|string|min:3',
        ];
    }
}
