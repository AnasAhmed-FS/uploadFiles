<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;

use App\Models\User_info ;
use App\Models\Data_file ;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function store_files(Request $request){
        /*
            $rules=[
                   'partic_address'=> 'required|max:120|unique:user_info|partic_address',
                   'name'=> 'required|max:120',
                   'file_content'=> 'required',
                ];

          $message=[
                'partic_address.required'=> 'The address filed is required', // we can exchange with trans('path')
                'partic_address.unique'=>  'This Address is registred',
                'name.required'=> 'The name filed is required',
                'name.max'=> 'This name is very larg',
                'file_content.required'=> 'The file content is requierd',
            ];
            $valid= Validator::make($request->all(),$rules,$message);
                        // test validator
                        if ( $valid->fails()){
                        //return   $valid->errors();
                           return redirect()->back()->withErrors($valid)->withInput($request->all());
                        }

        */
                // Retrieve the validated input...
               /* $validated_data = $request->validated();
                User_info::create($validated_data);
                Data_info::create($validated_data);*/
            User_info::create([
               'partic_address'=> $request -> addr,
           ]);

            Data_file::create([
                 'name'=> $request -> name,
                'file_content'=> $request -> file,
            ]);

            return redirect()->back()->with(['done'=>' Your Data inserted ']);

           }
}
