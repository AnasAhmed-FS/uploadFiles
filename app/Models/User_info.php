<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    use HasFactory;

    // Define table form database
    protected $table= "user_info" ;

    //call all attributes inside table
    protected $fillable = ['id' , 'partic_address'] ;

    // hidden any type do not need it
    //protected $hidden = ['updated_at', 'created_at'];

    // if you need time clock about operation it working
    public $timestamps = false;

    public function dataFile()
    {
        return $this->hasMany(Data_file::class,'user_id','id');
    }
}
