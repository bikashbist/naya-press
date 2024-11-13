<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Auth;
use DB;

class Tracker extends DM_BaseModel
{
    /**
     * to track the user with its user agent and method , url, ip address, data and time
     * https://stackoverflow.com/questions/29694372/laravel-visitors-counter?answertab=votes#tab-top
     */
    public $attributes = [ 'hits' => 0 ];
    protected $fillable = [ 'visitor', 'visit_date', 'visit_time', 'user_agent', 'request_method', 'request_uri' ];
    protected $table = 'trackers';
    protected $dates = ['created_at', 'updated_at'];

    public static function boot() {
        parent::boot();
        // Any time the instance is updated (but not created)
        if(DB::table('settings')->first()->tracker_status == 1){
            static::saving( function ($tracker) {
                $tracker->visit_time = date('H:i:s');
                $tracker->hits++;
            });
        }
    }

    public static function hit() {
        if(DB::table('settings')->first()->tracker_status == 1){
        static::firstOrCreate([
                    'visitor'   => $_SERVER['REMOTE_ADDR'],
                    'visit_date' => date('Y-m-d'),
                    'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                    'request_method' => $_SERVER['REQUEST_METHOD'],
                    'request_uri' => $_SERVER['REQUEST_URI'],
              ])->save();
        }
    }
}
