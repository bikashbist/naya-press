<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Illuminate\Http\Request;
use Auth;

class Popup extends DM_BaseModel
{

    protected $guarded = [''];
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'popups';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'popup';
    protected $prefix_path_image = '/upload_file/images/popup/';
   
    public function __construct() {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function storeData(Request $request, $images, $rows, $link, $order, $status ) {
        // if($request->hasFile('image')){
        //     $image = parent::uploadPopup($request, $this->folder_path_image ,$this->prefix_path_image,'image','','');  
        // }
        // else {
        //     $image = null;
        // }

        if ($request->hasFile('images')) {
            $post_thumbnail = parent::uploadMultipleImages($request, $this->folder_path_image, $this->prefix_path_image, 'images');
        } else {
            $post_thumbnail = null;
        }

        if (isset($post_thumbnail)) {
            $array_image = $post_thumbnail;  // Already an array, no need to slice or map it
        } else {
            $array_image = null;
        }

        $popup_unique_id = uniqid(Auth::user()->id.'_');
        foreach( $rows as $row) {
            $links[] = [
                'popup_unique_id' => $popup_unique_id,
                'lang_id' => $row['lang_id'],
                'title' => $row['title'],
                'description' => $row['description'],
                'link'  => $link,
                'order' => $order,
                'status' => $status,
                'created_at' => date('Y-m-d-h-m-s')
            ];
        }
        if (isset($array_image)) {
            foreach ($array_image as $file_row) {
                PopupImage::create([
                    'popup_unique_id' => $popup_unique_id,
                    'images' => $file_row, // Save each image
                ]);
            }
        }
        if(Popup::insert($links)) {
            return true;
        }else {
            return false;
        }

       
    }

    public function updateData(Request $request, $popup_unique_id, $images, $rows, $link, $order, $status ) {
        // if($request->hasFile('image')){
        //     $image = parent::uploadPopup($request, $this->folder_path_image ,$this->prefix_path_image,'image','','');  
        // }
        // else {
        //     $image = Popup::findOrFail($rows[0]['id'])->image;
        // }
        if ($request->hasFile('images')) {
            $post_thumbnail = parent::uploadMultipleImages($request, $this->folder_path_image, $this->prefix_path_image, 'images');
        }

        if (isset($post_thumbnail)) {
            $array_image = $post_thumbnail;  // Already an array, no need to slice or map it
        }
        foreach( $rows as $row) {
            if(isset($row['id'])){
                $popup = Popup::findOrFail($row['id']);
            }else{
                $popup = new Popup;
                $popup->popup_unique_id = $popup_unique_id;
            }
            $popup->lang_id = $row['lang_id'];
            $popup->title = $row['title'];
            $popup->description = $row['description'];
            $popup->order = $order;
            $popup->link = $link;
           // $popup->image = $image;
            $popup->status = $status;
            $popup->save();
        }
        if (isset($array_image)) {
            foreach ($array_image as $file_row) {
                PopupImage::create([
                    'popup_unique_id' => $popup_unique_id,
                    'images' => $file_row, // Save each image
                ]);
            }
        }
        if($popup->save()) {
            return true;
        }else {
            return false;
        }
    }
}
