<?php

namespace App\Model\Dcms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Audio extends DM_BaseModel
{


    protected $table = 'audio';
    protected $fillable = ['id', 'name', 'file','status'];
}
