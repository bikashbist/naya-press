<?php

namespace App\Model\Dcms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Dcms\DM_BaseModel;

class Provinces extends DM_BaseModel
{
    use HasFactory;

    protected $table ='provinces';
    protected $fillable =['province_en' ,'province_np'];

    public  function districts(){
        return $this->hasMany(Districts::class,'province_id','id');
    }

    
   
    
}
