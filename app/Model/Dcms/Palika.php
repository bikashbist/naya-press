<?php

namespace App\Model\Dcms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Dcms\DM_BaseModel;

class Palika extends DM_BaseModel
{
    use HasFactory;
    protected $table ='palikas';
    protected $fillable =['district_id','palika_en','palika_np'];

    public function district(){
        return $this->belongsTo(Districts::class);
    }
}
