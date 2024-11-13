<?php

namespace App\Model\Dcms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Model\Dcms\DM_BaseModel;

class Contact extends DM_BaseModel
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = ['name', 'email', 'subject', 'number','message'];
}
