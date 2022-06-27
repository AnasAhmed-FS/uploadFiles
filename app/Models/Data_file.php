<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_file extends Model
{
    use HasFactory;

    // Define table form database
    protected $table= "data_files" ;

    //call all attributes inside table
    protected $fillable = ['id','user_id','name','file_content'] ;

    // hidden any type do not need it
      //protected $hidden = ['file_id'];
    public $timestamps = false;

    public function userInfo()
    {
        return $this->belongsTo(User_info::class,'user_id','id');
    }

}
