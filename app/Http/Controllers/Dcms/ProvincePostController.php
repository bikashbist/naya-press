<?php

namespace App\Http\Controllers\Dcms;

use App\Model\Dcms\Districts;
use App\Model\Dcms\ProvincePost;
use App\Model\Dcms\Provinces;
use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\TagPost;
use App\Model\Dcms\File;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\PostImage;
use DB;
use Illuminate\Support\Str;
use Auth;
use DateTime;
use App\Model\Dcms\Tracker;
use Illuminate\Support\Facades\Validator;
use Response;


class ProvincePostController extends DM_BaseController
{

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table;


    public function __construct(Request $request, ProvincePost $province_post, File $file, DM_Post $dm_post, Tracker $tracker) {
        $this->middleware('auth');
        $this->middleware('permission:province_post-list', ['only' => ['indexProvincePost']]);
        $this->middleware('permission:province_post-create', ['only' => ['createPost','storeProvincePost']]);
        $this->middleware('permission:province_post-edit', ['only' => ['editProvincePost','updateProvincePost']]);
        $this->middleware('permission:page-delete', ['only' => ['destroy']]);
        $this->middleware('permission:deleted-province_post', ['only' => ['deletedProvincePost']]);
        $this->middleware('permission:delete-province_post-permanently', ['only' => ['permanentDelete']]);
        $this->middleware('permission:restore-province_post', ['only' => ['restore']]);
        $this->model = $province_post;
        $this->file_model = $file;
        $this->table = DB::table('province_posts');
        $this->dm_post = $dm_post;
        $this->lang_id = $dm_post::setLanguage();
        $this->tracker = $tracker::hit();
    }

    /** ======================c==========POST==================================================== */
    /**
     * Post index
     */
    public function indexProvincePost() {
        $this->panel = 'Province Post';
        $this->base_route = 'dcms.province_post';
        $this->view_path = 'dcms.province_post';
        $data['rows'] = $this->model::where('type', '=', 'post')->where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }
    public function createProvincePost() {
        $this->tracker;
        $this->panel = 'Province Post';
        $this->base_route = 'dcms.province_post';
        $this->view_path = 'dcms.province_post';
        $data['lang']= $this->dm_post::getLanguage();
       // $data['tags'] = $this->dm_post::getTags();
        $data['provinces'] = Provinces::all();
        return view(parent::loadView($this->view_path.'.create'), compact('data'));
    }
    public function storeProvincePost(Request $request) {
        $data = $request->all();
        $validator = Validator::make($data, [
            'rows.*.title' => 'nullable|max:225',
            'rows.*.description' => 'nullable',
            'images.*' => 'mimes:jpeg,jpg,png,gif|max:50000',
            'file_title' => 'array|max:225',
            'status' => 'required|boolean' ,
            'province' => 'required',
            'district' => 'required'
        ]);
        $validator->after(function ($validator) use ($request) {
            // Check if there is at least one title or description across all rows
            $hasTitle = collect($request->input('rows'))->pluck('title')->filter()->isNotEmpty();
            $hasDescription = collect($request->input('rows'))->pluck('description')->filter()->isNotEmpty();

            // If no title and no description is present, fail validation
            if (!$hasTitle && !$hasDescription) {
                $validator->errors()->add('rows', 'At least one title or one description is required across all rows.');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $this->tracker;
        $this->panel = 'Province Post';
        $this->base_route = 'dcms.province_post';
        $this->view_path = 'dcms.province_post';
        if($this->model->storeData($request, $request->province,$request->district, $request->type, $request->rows, $request->images, $request->status, $request->file_title, $request->file)){
            session()->flash('alert-success', $this->panel.' Successfully Added');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be added');
        }
        return redirect()->route($this->base_route.'.index');
    }
    public function editProvincePost(Request $request, $post_unique_id) {
        $this->tracker;
        $this->panel = 'Province Post';
        $this->base_route = 'dcms.province_post';
        $this->view_path = 'dcms.province_post';
        $post = $this->model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['file'] = $this->file_model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['single'] = $this->model::where('post_unique_id', '=', $post_unique_id)->first();
        $data['lang'] = $this->dm_post::getLanguage();
        $data['images'] = PostImage::where('post_unique_id',$post_unique_id)->get();
        //$data['tags'] = $this->dm_post::getTag();
       // Get provinces and districts
        $data['provinces'] = Provinces::all();
        $data['districts'] = Districts::where('province_id', $data['single']->province_id)->get(); // Get districts of the selected province
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'post'));
    }
    public function updateProvincePost(Request $request, $post_unique_id) {
        //dd($request->all());
        $data =  $request->all();
        $validator = Validator::make($data, [
            'rows.*.title' => 'nullable|max:225',
            'rows.*.description' => 'nullable',
            'images.*' => 'mimes:jpeg,jpg,png,gif|max:50000',
            'file_title' => 'array|max:225',
            'status' => 'required|boolean' ,
            'province' => 'required',
            'district' => 'required'
        ]);
        $validator->after(function ($validator) use ($request) {
            // Check if there is at least one title or description across all rows
            $hasTitle = collect($request->input('rows'))->pluck('title')->filter()->isNotEmpty();
            $hasDescription = collect($request->input('rows'))->pluck('description')->filter()->isNotEmpty();

            // If no title and no description is present, fail validation
            if (!$hasTitle && !$hasDescription) {
                $validator->errors()->add('rows', 'At least one title or one description is required across all rows.');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->tracker;
        $this->panel = 'Province Post';
        $this->base_route = 'dcms.province_post';
        $this->view_path = 'dcms.province_post';
        if($this->model->updateData($request, $request->type, $request->province, $request->district,$request->rows,  $request->images,  $request->status, $request->file_title, $request->file, $post_unique_id)){
            session()->flash('alert-success', $this->panel.' Successfully updated');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be updated');
        }
        return redirect()->route($this->base_route.'.index');
    }

    public function deletedProvincePost() {
        $this->tracker;
        $this->panel = 'Province Post';
        $this->base_route = 'dcms.province_post';
        $this->view_path = 'dcms.province_post';
        $data['rows'] = ProvincePost::where('deleted_at', '!=', null)->where('type', '=', 'post')->where('lang_id', '=', $this->lang_id)->get();
        return view(parent::loadView($this->view_path.'.deleted'), compact('data'));

    }


    public function restore($post_unique_id) {
        $this->tracker;
        $data = $this->model::where('post_unique_id', '=', $post_unique_id)->get();
        foreach( $data as $row) {
            $row->deleted_at = null;
            $row->save();
        }
    }

    public function permanentDelete($post_unique_id) {
        $this->tracker;
        $data = $this->model::where('post_unique_id', '=', $post_unique_id)->get();
        foreach( $data as $row) {
            $this->model::where('post_unique_id', '=', $post_unique_id)->delete();
        }
    }

    public function getDistrict($id)
    {
        $districts = Districts::where("province_id", $id)->get(["district_np", "id"]);
        return response()->json(['districts' => $districts]);
    }

    public function destroy($post_unique_id) {
        $this->tracker;
        $data = $this->model::where('post_unique_id', '=', $post_unique_id)->get();
        foreach( $data as $row) {
            $row->deleted_at = new DateTime();
            $row->save();
        }
    }
    public function delete_multiple_image($id)
    {
        $data =  PostImage::findorfail($id);
        $data->delete();
        session()->flash('alert-danger', 'Image Successfully delete');
    
        return redirect()->back();
    }

}
