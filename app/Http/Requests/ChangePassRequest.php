<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            'current_pass' => 'required|min:3',
            'new_pass' => 'required|min:3|same:confirm_new_pass',
            'confirm_new_pass' => 'required|min:3'
        ];
    }
}
