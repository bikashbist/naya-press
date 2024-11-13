<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Illuminate\Http\Request;
use App\Model\Dcms\AffiliatedProgramCategory;
use Auth;

class AffiliatedProgram extends DM_BaseModel
{
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    // protected $table = 'sliders';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'program';
    protected $prefix_path_image = '/upload_file/images/program/';
    protected $prefix_path_file = '/upload_file/files/program/';


    public function __construct() {
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function storeData(Request $request, $affiliated_id, $category_id, $file, $rows, $status, $type) {
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
                'affiliated_id' => $affiliated_id,
                'category_id' => $category_id,
                'type' => $type,
                'file' => $files,
                'status' => $status,
                'created_at' => date('Y-m-d-h-m-s')

            ];
        }
        if(AffiliatedProgram::insert($data)) {
            return true;
        }else {
            return false;
        }

    }

    public function updateData(Request $request, $unique_id, $affiliated_id, $category_id, $file, $rows, $status, $type) {
        if($request->hasFile('file')){
            $files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'files');
        }
        else {
            $files = AffiliatedProgram::findOrFail($rows[0]['id'])->file;
        }
        foreach( $rows as $row) {
            if(isset($row['id'])){
                $data = AffiliatedProgram::findOrFail($row['id']);
            }else{
                $data = new AffiliatedProgram;
                $data->unique_id = $unique_id;
            }
            $data->lang_id = $row['lang_id'];
            $data->title = $row['title'];
            $data->description = $row['description'];
            $data->affiliated_id = $affiliated_id;
            $data->category_id = $category_id;
            $data->file = $file;
            $data->type = $type;
            $data->status = $status;
            $data->save();
        }
        if($data->save()) {
            return true;
        }else {
            return false;
        }

    }

    public function programCategory() {
        return $this->belongsTo(AffiliatedProgramCategory::class, 'category_id');
    }
}
