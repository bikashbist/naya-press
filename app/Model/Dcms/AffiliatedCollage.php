<?php

namespace App\Model\Dcms;

use Illuminate\Database\Eloquent\Model;
use App\Model\Dcms\DM_BaseModel;
use Illuminate\Http\Request;
use Auth;


class AffiliatedCollage extends DM_BaseModel
{
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    // protected $table = 'sliders';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'campus';
    protected $prefix_path_image = '/upload_file/images/campus/';
    protected $prefix_path_file = '/upload_file/files/campus/';


    public function __construct() {
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function storeData(Request $request, $affiliated_id, $campus_type, $file, $rows, $status, $url, $type, $level) {
        if($request->hasFile('file')){
            $files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'files');
        }
        else {
            $files = null;
        }

        $unique_id = uniqid(Auth::user()->id.'_');
        foreach( $rows as $row) {
            $data[] = [
                'unique_id' => $unique_id,
                'lang_id' => $row['lang_id'],
                'title' => $row['title'],
                'description' => $row['description'],
                'level' => $level,
                'affiliated_id' => $affiliated_id,
                'file' => $files,
                'status' => $status,
                'campus_type' => $campus_type,
                'type' => $type,
                'url' => $url,
                'created_at' => date('Y-m-d-h-m-s')

            ];
        }
        if(AffiliatedCollage::insert($data)) {
            return true;
        }else {
            return false;
        }

    }

    public function updateData(Request $request, $unique_id, $affiliated_id, $campus_type, $file, $rows, $status, $url, $type, $level) {
        if($request->hasFile('file')){
            $files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'files');
        }
        else {
            $files = AffiliatedCollage::findOrFail($rows[0]['id'])->file;
        }
        foreach( $rows as $row) {
            if(isset($row['id'])){
                $data = AffiliatedCollage::findOrFail($row['id']);
            }else{
                $data = new AffiliatedCollage;
                $data->unique_id = $unique_id;
            }
            $data->lang_id = $row['lang_id'];
            $data->title = $row['title'];
            $data->description = $row['description'];
            $data->level = $level;
            $data->affiliated_id = $affiliated_id;
            $data->file = $file;
            $data->campus_type = $campus_type;
            $data->type = $type;
            $data->status = $status;
            $data->url = $url;
            $data->save();
        }
        if($data->save()) {
            return true;
        }else {
            return false;
        }
    }
}
