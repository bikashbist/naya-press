<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Illuminate\Http\Request;
use Auth;

class Advistement extends DM_BaseModel
{
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'advistement';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'advistement';
    protected $prefix_path_image = '/upload_file/images/advistement/';
   
    public function __construct() {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function storeData(Request $request, $image, $title, $url, $rank, $status ) {
        if($request->hasFile('image')){
            $image = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image','','');  
        }
        else {
            $image = null;
        }
       
            $links[] = [
                'title' => $title,
                'url'  => $url,
                'rank' => $rank,
                'status' => $status,
                'image' => $image,
                'created_at' => date('Y-m-d-h-m-s')
            ];
        
        if(Advistement::insert($links)) {
            return true;
        }else {
            return false;
        }
    }

    public function updateData(Request $request,$id, $image,  $title, $url, $rank, $status ) {
        $adv = Advistement::findOrFail($id);
        if($request->hasFile('image')){
            $image = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image','','');  

            $adv->image = $image;
        }
       
            //$adv = new Advistement;
            $adv->title = $title;
            $adv->rank = $rank;
            $adv->url = $url;
           // $adv->image = $image;
            $adv->status = $status;
            $adv->save();
        if($adv->save()) {
            return true;
        }else {
            return false;
        }
    }
}
