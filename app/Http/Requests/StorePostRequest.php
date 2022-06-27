<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
    // these rules helper to have validation about input user
     {
        return  [
          //  'addr'=> 'required|max:120|unique:user_info,partic_address',
            'addr'=> 'required|max:120|unique:user_info,partic_address',
            'id_code'=>'required|max:255',
            'name'=> 'required|max:120',
            'file'=> 'required',
            'file.*'=> 'mimes:mp3,mp4,jpg,png,csv,txt,xlx,xls,pdf|max:2048',
            'reCode_id'=>'required|max:255',
        ];

    }

    // public function messages(){
        // Here we can custimize specific messages to each error
    //     return [
    //         'partic_address.required'=> 'The address filed is required', // we can exchange with trans('path')
    //         'partic_address.unique'=>  'This Address is registred',
    //         'name.required'=> 'The name filed is required',
    //         'name.max'=> 'This name is very larg',
    //         'file_content.required'=> 'The file content is requierd',
    //     ];
    // }
}
