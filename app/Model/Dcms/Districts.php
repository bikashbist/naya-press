<?php

namespace App\Model\Dcms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Dcms\DM_BaseModel;

class Districts extends DM_BaseModel
{
    use HasFactory;

    protected $table ='districts';
    protected $fillable =['province_id','district_en' ,'district_np'];

    public function province(){
        return $this->belongsTo(Provinces::class);
    }

    public  function palikas(){
        return $this->hasMany(Palika::class,'district_id','id');
    }

    public function posts()
    {
        return $this->hasMany(ProvincePost::class, 'district_id');
    }
}
