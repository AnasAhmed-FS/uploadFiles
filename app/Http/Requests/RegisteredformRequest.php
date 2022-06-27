<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisteredformRequest extends FormRequest
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
            'name'=> 'required|max:120',
            'file'=> 'required',
            'file.*'=> 'mimes:mp3,mp4,jpg,png,csv,txt,xlx,xls,pdf|max:2048',
            'reCode_id'=>'required|max:255',
        ];
    }
}
