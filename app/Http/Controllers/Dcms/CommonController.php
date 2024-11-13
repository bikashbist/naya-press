<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Common;
use App\Model\Dcms\Eloquent\DM_Post;
use Illuminate\Support\Str;
use Response;
use DB;

class CommonController extends DM_BaseController
{

    protected $model;
    protected $base_route = 'dcms.setting';
    protected $view_path = 'dcms.setting';
    protected $panel = '';
    protected $folder = 'setting';
    protected $folder_path;
    protected $folder_path_file_manager;
    protected $image_prefix_path = 'upload_file/images/setting/';
    protected $image_prefix_path_file_manager = 'upload_file/upload/';

    public function __construct(Common $common, Tracker $tracker, DM_Post $dm_post) {
        $this->middleware('auth');
        $this->middleware('permission:header-setting', ['only' => ['getTitleSetting','updateTitleSetting']]);
        $this->middleware('permission:footer-setting', ['only' => ['getFooterSetting','updateFooterSetting']]);
        $this->model = $common;
        $this->tracker = $tracker::hit();
        $this->lang_id = $dm_post::setLanguage();
        $this->dm_post = $dm_post;
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR .'images'. DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;    
        $this->folder_path_file_manager = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR .'upload'.  DIRECTORY_SEPARATOR;    
    }
 
    public function getTitleSetting() {
        $this->tracker;
        $this->panel = 'Setting';
        $data['single'] = $this->model::where('common_unique_id', '=', 1)->first();
        $data['lang'] = $this->dm_post::getLanguage();
        $titles = $this->model::where('common_unique_id', '=', 1)->get();
        if(!isset($data['single']) || !is_object($data['single']) ) {
            $data = $this->model;
            $data->lang_id = $this->lang_id;
            $data->common_unique_id = 1;
            $data->save();
        }
        return view(parent::loadView($this->view_path.'.header.index'), compact('data', 'titles'));
    }

    public function updateTitleSetting(Request $request) {
        // dd($request->rows);
        // $request->validate([
        //     'name' => 'required|max:225',
        //     'slogan' => 'max:225',
        //     'title' => 'required|max:225',
        //     'description' => 'required',
        //     'meta' => 'required',
        //     'logo' => 'image',
        // ]);
        $this->tracker;
       
        if($request->hasFile('logo')){
            $logo = parent::uploadFile($this->folder_path, $this->image_prefix_path, 'logo', $request); 
        }
        else {
            $logo = $this->model::findOrFail($request->rows[0]['id'])->logo;;
        }
        foreach( $request->rows as $row) {
            if(isset($row['id'])){
                $link = $this->model::findOrFail($row['id']);
            }else{
                $link = new $this->model;
                $link->common_unique_id = $request->common_unique_id;
            }
            $link->lang_id = $row['lang_id'];
            $link->logo = $logo;
            $link->header_first_title = $row['header_first_title'];
            $link->header_second_title = $row['header_second_title'];
            $link->header_third_title = $row['header_third_title'];
            $link->header_fourth_title = $row['header_fourth_title'];
            $link->save();
        }
        if($link->save()) {
            session()->flash('alert-success', $this->panel.' Successfully added');
        }else {
            return false;
        }
        return back();
    }

    public function getFooterSetting() {
        $this->tracker;
        $this->panel = 'Setting';
        $data['single'] = $this->model::where('common_unique_id', '=', 1)->first();
        $data['lang'] = $this->dm_post::getLanguage();
        $titles = $this->model::where('common_unique_id', '=', 1)->get();
        if(!isset($data['single']) || !is_object($data['single']) ) {
            $data = $this->model;
            $data->lang_id = $this->lang_id;
            $data->common_unique_id = 1;
            $data->save();
        }
        return view(parent::loadView($this->view_path.'.footer.index'), compact('data', 'titles'));
    }

    public function updateFooterSetting(Request $request){
        $this->tracker;
        foreach( $request->rows as $row) {
            if(isset($row['id'])){
                $link = $this->model::findOrFail($row['id']);
            }else{
                $link = new $this->model;
                $link->common_unique_id = $request->common_unique_id;
            }
            $link->lang_id = $row['lang_id'];
            $link->footer_first_title = $row['footer_first_title'];
            $link->footer_first_description = $row['footer_first_description'];
            $link->footer_second_title = $row['footer_second_title'];
            $link->footer_second_description = $row['footer_second_description'];
            $link->footer_third_title = $row['footer_third_title'];
            $link->footer_third_description = $row['footer_third_description'];
            $link->footer_fourth_title = $row['footer_fourth_title'];
            $link->footer_fourth_description = $row['footer_fourth_description'];
            $link->save();
        }
        if($link->save()) {
            session()->flash('alert-success', $this->panel.' Successfully added');
        }else {
            return false;
        }
        return back();
    }
}
