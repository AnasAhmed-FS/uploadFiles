<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class prodRequest extends FormRequest
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
        'nameEn'=>['required' ] ,
            // 'nameAr'=>['required'  ] ,
   
            // 'prodEn'=>['required'  ] ,
            // 'prodAr'=> ['required' ],
   
            // 'priceEn'=>  ['required','max:100','numeric'],
            // 'priceAr'=> ['required','max:100','numeric'],
           // 'file' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'

            'email'=>['required','email' ],
            'password'=> ['required' ],
        ];
    }
}
