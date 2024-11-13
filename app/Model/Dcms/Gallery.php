<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use App\Model\Dcms\Album;

class Gallery extends DM_BaseModel
{
    protected $dates = ['deleted_at'];
    protected $softDelete = true;
    protected $fillable = ['album_id', 'title', 'image'];

    /** Many To One Relationship */
    public function album() {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
