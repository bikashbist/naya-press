<?php

namespace App\Model\Dcms;

use Illuminate\Database\Eloquent\Model;

class Nabikaran extends Model
{
    //

    public function getData()
    {
        return $this->orderBy('id', 'DESC')->where("user_id", request()->user()->id)->paginate(5);
    }

    public function getMemberTable()
    {
        return Membership::where("user_id", request()->user()->id)->first();
    }
}
