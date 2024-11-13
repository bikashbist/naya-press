<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Illuminate\Http\Request;
use DB;
use Auth;

class AffiliatedBanner extends DM_BaseModel
{
    // public function sliders() {
    //     return $this->hasMany(DB::table('sliders_name'), 'id');
    // }

    // public function sliders_name() {
    //     return $this->belongsTo(DB::table('sliders'));
    // }
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    // protected $table = 'sliders';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'banner';
    protected $prefix_path_image = '/upload_file/images/banner/';



    public function __construct() {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function storeData(Request $request, $image, $name, $rows, $institute, $type) {
        new AffiliatedBanner;
        if($request->hasFile('image')){
            $image = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image','1920','700');
        }
        // $slider->save();

        // foreach($rows as $row) {
        //     DB::table('sliders_name')->insert(array([
        //         'slider_id' => $slider->id,
        //         'lang_id' => $row['lang_id'],
        //         'name' => $row['lang_name'],
        //         'description' => $row['description'],
        //     ]));
        // }
        // return true;

        $unique_id = uniqid(Auth::user()->id.'_');
        foreach( $rows as $row) {
            $links[] = [
                'unique_id' => $unique_id,
                'lang_id' => $row['lang_id'],
                'name' => $row['name'],
                'affiliated_id' => $institute,
                'image' => $image,
                'type' => $type,
                'created_at' => date('Y-m-d-h-m-s')

            ];
        }
        if(AffiliatedBanner::insert($links)) {
            return true;
        }else {
            return false;
        }

    }

    public function updateData(Request $request, $unique_id, $image, $rows, $institute, $type) {
        if($request->hasFile('image')){
            $image = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image','','');
        }
        else {
            $image = AffiliatedBanner::findOrFail($rows[0]['id'])->image;
        }
        foreach( $rows as $row) {
            if(isset($row['id'])){
                $popup = AffiliatedBanner::findOrFail($row['id']);
            }else{
                $popup = new AffiliatedBanner;
                $popup->unique_id = $unique_id;
            }
            $popup->lang_id = $row['lang_id'];
            $popup->name = $row['name'];
            $popup->image = $image;
            $popup->type = $type;
            $popup->affiliated_id = $institute;
            $popup->save();
        }
        if($popup->save()) {
            return true;
        }else {
            return false;
        }

        return true;
    }
}
