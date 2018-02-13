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

        $rules = [
                'title'       => 'required|max:85',
                'description' => 'required',
                'date'        => 'required|date',
                'img'         => 'required_if:data-images,false'
        ]; 

        $images = count($this->img);

        foreach(range(0, $images) as $index) {

            $rules['img.'.$index] = 'mimes:jpeg,png,jpg';
        }


        $videos = count($this->videos);

        foreach(range(0, $videos) as $index) {

            if(isset($this->videos[$index])) {
                $rules['videos.'.$index] = 'regex:/^(https?\:\/\/)?(www\.)?(youtube\.com)\/.+$/';
            }
        }

        return $rules;
    }

}
