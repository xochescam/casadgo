<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            // 'title'       => 'required',
            // 'description' => 'required',
            // 'date'        => 'required|date_format:Y-m-d',
            // 'img'         => 'required',
            'videos'      => 'required|regex:<iframe[\s]+?src="(http[s]*:\/\/)?www\.youtube\.com\/embed\/([a-zA-Z0-9-_]{11})[^"]*"[^>]*?><\/iframe>',
            //'img'       => 'required|mimes:jpeg,jpg,gif,png',
            //'videos'    => 'required|mimes:jpeg,jpg,gif,png',
            ];
    }
}
