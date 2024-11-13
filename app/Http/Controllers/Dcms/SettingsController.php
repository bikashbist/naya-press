<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Setting;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;
use App\Model\Dcms\Tracker;

class SettingsController extends DM_BaseController
{
    protected $model;
    protected $base_route = 'dcms.setting';
    protected $view_path = 'dcms.setting';
    protected $panel = '';
    protected $folder = 'setting';
    protected $folder_path;
    protected $image_prefix_path = 'upload_file/images/setting/';


    public function __construct(Setting $setting, Tracker $tracker, DM_Post $dm_post){
        $this->middleware('auth');
        $this->middleware('permission:general-setting', ['only' => ['getGeneralSetting', 'updateGeneralSetting']]);
        $this->middleware('permission:social-setting', ['only' => ['getSocialProfiles','updateSocialProfiles']]);
        $this->middleware('permission:about-setting', ['only' => ['getContactDetails','updateContactDetails']]);
        $this->model = $setting;
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR .'images'. DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->tracker = $tracker::hit();
        $this->lang_id = $dm_post::setLanguage();

    }

    public function getGeneralSetting(){
        $this->tracker;
        $this->panel = 'Setting';
        $row = DB::table('settings')->select('id', 'site_name', 'site_slogan', 'site_title', 'site_description', 'site_url', 'meta_keyword', 'logo', 'language', 'tracker_status','hero_banner')->first();
        if(!isset($row) || !is_object($row) ) {
            $data = $this->model;
            $data->site_name = null;
            $data->save();
        }
        return view(parent::loadView($this->view_path.'.index'), compact('row'));
    }

    public function updateGeneralSetting(Request $request, $id){
        $request->validate([
            'name' => 'required|max:225',
            'slogan' => 'max:225',
            'title' => 'required|max:225',
            'description' => 'nullable',
            'meta' => 'nullable',
            'logo' => 'image',
            'hero_banner' =>'image',
        ]);
        $this->tracker;
        $row = $this->model::findOrFail($id);
        $row->site_name = $request->name;
        $row->site_slogan = $request->slogan;
        $row->site_title = $request->title;
        $row->site_description = $request->description;
        $row->meta_keyword = $request->meta;
        if($request->hasFile('logo')){
            $row->logo = parent::uploadFile($this->folder_path, $this->image_prefix_path, 'logo', $request);
        }
        if($request->hasFile('hero_banner')){
            $row->hero_banner = parent::uploadFile($this->folder_path, $this->image_prefix_path, 'hero_banner', $request);
        }
        $row->language = $request->language;
        $row->save();
        session()->flash('alert-success', $this->panel.' Successfully added');
        return back();
    }

    public function getSocialProfiles(){
        $this->tracker;
        $this->panel = 'Social Profile';
        $row = DB::table('settings')->select('id', 'social_profile_fb', 'social_profile_twitter', 'social_profile_insta', 'social_profile_linkedin', 'social_profile_youtube')->first();
        if(!isset($row) || !is_object($row) ) {
            $data = $this->model;
            $data->social_profile_fb = null;
            $data->save();
        }
        return view(parent::loadView($this->view_path.'.social.index'), compact('row'));
    }

    public function updateSocialProfiles(Request $request, $id){
        // $request->validate([
        //     'facebook' => 'url',
        //     'twitter' => 'url',
        //     'insta' => 'url',
        //     'youtube' => 'url',
        //     'linkedin' => 'url',
        // ]);
        $this->tracker;
        $row = $this->model::findOrFail($id);
        $row->social_profile_fb = $request->facebook;
        $row->social_profile_twitter = $request->twitter;
        $row->social_profile_insta = $request->insta;
        $row->social_profile_youtube = $request->youtube;
        $row->social_profile_linkedin = $request->linkedin;
        $row->save();
        session()->flash('alert-success', $this->panel.' Successfully added');
        return back();
    }

    public function getContactDetails(){
        $this->tracker;
        $this->panel = 'Contact';
        $row = DB::table('settings')->select('id', 'contact_title', 'contact_sub_title', 'contact_address_1', 'contact_address_2', 'contact_phone', 'contact_fax', 'contact_mobile', 'contact_email', 'contact_url', 'contact_map','pan_no','vat_no')->first();
        if(!isset($row) || !is_object($row) ) {
            $data = $this->model;
            $data->contact_title = null;
            $data->save();
        }
        return view(parent::loadView($this->view_path.'.contact.index'), compact('row'));
    }

    public function updateContactDetails(Request $request, $id){
        $this->tracker;
        $row = $this->model::findOrFail($id);
        $row->contact_title = $request->title;
        $row->contact_sub_title = $request->sub_title;
        $row->contact_address_1 = $request->address_one;
        $row->contact_address_2 = $request->address_two;
        $row->contact_phone = $request->phone;
        $row->contact_mobile = $request->mobile;
        $row->contact_email = $request->email;
        $row->contact_map = $request->map;
        $row->vat_no = $request->vat_no;
        $row->pan_no = $request->pan_no;
        $row->save();
        session()->flash('alert-success', $this->panel.' Successfully added');
        return back();
    }

    public function getAboutDetails(Request $request){
        $this->tracker;
        $this->panel = 'About';
        $row = DB::table('settings')->select('id', 'about_title', 'about_sub_title', 'about_description', 'about_image')->first();
        if(!isset($row) || !is_object($row) ) {
            $data = $this->model;
            $data->about_title = null;
            $data->save();
        }
        return view(parent::loadView($this->view_path.'.about.index'), compact('row'));
    }

    public function updateAboutDetails(Request $request, $id){
        $this->tracker;
        $row = $this->model::findOrFail($id);
        $row->about_title = $request->title;
        $row->about_sub_title = $request->sub_title;
        $row->about_description = $request->description;
        if($request->hasFile('image')){
            $row->about_image = parent::uploadFile($this->folder_path, $this->image_prefix_path, 'image', $request);
        }
        $row->save();
        session()->flash('alert-success', $this->panel.' Successfully added');
        return back();
    }

}
