<?php

namespace App\Http\Controllers;
use App\Http\Controllers ;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\RegisteredformRequest;
use App\Models\User_info ;
use App\Models\Data_file ;

class FilesController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */


        // appear first page to register in database with unique code and address
    public function Fir_view_pg(){
        return view('storageData');
    }
        // let is start to store user data in tables ( user_info && data_file)
    public function store_files(StorePostRequest $request){
        // we used Authorizing Form Requests to Valid our requests

        // get file from user and rename it again
        $fileName = time().'.'.$request->file->extension();
        // then ready to upload and store this file in your specific path
       $startUpload =  $request->file->move(public_path('files'), $fileName);

        // callin database to insert data there
      User_info::create([
        'id' => $request -> id_code,
        'partic_address' => $request -> addr,
       ]);
       Data_file::create([
        'name' => $request ->name ,
        'file_content' => $startUpload,
        'user_id' => $request -> reCode_id,
       ]);
       // if we dont have any error we will redirect back agin to original page with operation sucsess
      return redirect()->back()->with(['done'=>' Your register and data are done ']);
    }



     // If user registered his address and determined his code (this page will be main work)
    public function view_pg_registered(){
     return view('storageFileData');
    }
    // Insert data in only table data_file
    public function store_files_reg(RegisteredformRequest $request){

        // get file from user and rename it again
        $fileName = time().'.'.$request->file->extension();
        // then ready to upload and store this file in your specific path
       $startUpload =  $request->file->move(public_path('files'), $fileName);

       // callin only Data File database to insert data there
      Data_file::create([
       'name' => $request ->name ,
       'file_content' => $startUpload,
       'user_id' => $request -> reCode_id,
      ]);
       // if we dont have any error we will redirect back agin to original page with operation sucsess
      return redirect()->back()->with(['done'=>' Your data inserted ']);
    }

    // Show all datbase data inside abut user_info table:
        // Show user_info table  in webpage
    public function showUserData(){
     $UserInfo =  User_info::select('id','partic_address')->get();
     return view('showUserData',compact('UserInfo'));
    }
        // Show data_file in webpage
    public function showDataFile($dataFile_id){
       $printInfo =  User_info::find($dataFile_id);
       $printInfoData = $printInfo ->dataFile;
       return view('showFileData',compact('printInfoData'));
    }
    // Start to Edit and Update data for data_file table
        // Appear page with permission to modify old data inserted
    public function editDataFile($editFile_id){
        $edit_Data_file = Data_file::select([
            'id',
            'name',
            'file_content',
            'user_id',
           ])->find($editFile_id);
        if(!$edit_Data_file)
            return redirect()->back();

       return view('editFileData',compact('edit_Data_file'));
    }
        // Save new data was updating
    public function updateEditDataFile(RegisteredformRequest $request,$updataDataFile_id){

        // get file from user and rename it again
       $fileName = time().'.'.$request->file->extension();
       // then ready to upload and store this file in your specific path
      $startUpload =  $request->file->move(public_path('files'), $fileName);

       $lunUpdate=Data_file::find($updataDataFile_id);
       $lunUpdate ->update([
        'name' => $request ->name ,
        'file_content' => $startUpload,
        'user_id' => $request -> reCode_id,
       ]);
       return redirect()->route('file.data',$lunUpdate->user_id);
    }

    public function deleteDataFile($deleteDataFile_id){
        $lunDeleteFile=Data_file::find($deleteDataFile_id);
        if(!$lunDeleteFile)
            return redirect()->back()->with(['done'=>' Your data not exist ']);

       $lunDeleteFile->delete();
       return redirect()->back()->with(['done'=>' Your row deleted ']);
    }

}
