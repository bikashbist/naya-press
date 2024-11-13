<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Illuminate\Http\Request;
use DB;

class Slider extends DM_BaseModel
{

    public function sliders() {
        return $this->hasMany(DB::table('sliders_name'), 'id');
    }

    public function sliders_name() {
        return $this->belongsTo(DB::table('sliders'));
    }
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'sliders';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'slider';
    protected $prefix_path_image = '/upload_file/images/slider/';
   


    public function __construct() {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function storeData(Request $request, $image, $name, $rows) {
        // dd($image, $name, $rows);
        $slider = new Slider;
        $slider->name = $name;
        if($request->hasFile('image')){
            $slider->image = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image','1920','700');  
        }
        $slider->save();

        foreach($rows as $row) {
            DB::table('sliders_name')->insert(array([
                'slider_id' => $slider->id,
                'lang_id' => $row['lang_id'],
                'name' => $row['lang_name'],
                'description' => $row['description'],
            ])); 
        }
        return true;

    }

    public function updateData(Request $request, $id, $image, $name, $rows) {
        $slider = Slider::findOrFail($id);
        $slider->name = $name;
        if($request->hasFile('image')){
            $slider->image = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image','1920','700');  
        }
        $slider->save();
        foreach($rows as $row) {
            $slider_name = DB::table('sliders_name')->where('slider_id', $id)->where('lang_id', $row['lang_id'])->first();
            if(isset($slider_name)){
                DB::table('sliders_name')->where('slider_id', $id)->where('lang_id', $row['lang_id'])->update([
                    'slider_id' => $id,
                    'lang_id' => $row['lang_id'],
                    'name' => $row['lang_name'],
                    'description' => $row['description'],

                ]);
            }else {
                DB::table('sliders_name')->where('slider_id', $id)->where('lang_id', $row['lang_id'])->insert([
                    'slider_id' => $id,
                    'lang_id' => $row['lang_id'],
                    'name' => $row['lang_name'],
                    'description' => $row['description'],

                ]);
            }
        }
        
        return true;
    }
}
