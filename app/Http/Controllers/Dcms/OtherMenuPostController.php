<?php

namespace App\Http\Controllers\Dcms;

use App\Model\Dcms\OtherMenuPost;
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


class OtherMenuPostController extends DM_BaseController
{

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table;


    public function __construct(Request $request, OtherMenuPost $other_menu_post, File $file, DM_Post $dm_post, Tracker $tracker) {
        $this->middleware('auth');
        $this->middleware('permission:other_menu_post-list', ['only' => ['indexOtherMenuPost']]);
        $this->middleware('permission:other_menu_post-create', ['only' => ['createPost','storeOtherMenuPost']]);
        $this->middleware('permission:other_menu_post-edit', ['only' => ['editOtherMenuPost','updateOtherMenuPost']]);
        $this->middleware('permission:page-delete', ['only' => ['destroy']]);
        $this->middleware('permission:deleted-other_menu_post', ['only' => ['deletedOtherMenuPost']]);
        $this->middleware('permission:delete-other_menu_post-permanently', ['only' => ['permanentDelete']]);
        $this->middleware('permission:restore-other_menu_post', ['only' => ['restore']]);
        $this->model = $other_menu_post;
        $this->file_model = $file;
        $this->table = DB::table('other_menu_posts');
        $this->dm_post = $dm_post;
        $this->lang_id = $dm_post::setLanguage();
        $this->tracker = $tracker::hit();
    }

    /** ================================POST==================================================== */
    /**
     * Post index
     */
    public function indexOtherMenuPost() {
        $this->panel = 'Other Menu Post';
        $this->base_route = 'dcms.other_menu_post';
        $this->view_path = 'dcms.other_menu_post';
        $data['rows'] = $this->model::where('type', '=', 'post')->where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }
    public function createOtherMenuPost() {
        $this->tracker;
        $this->panel = 'Other Menu Post';
        $this->base_route = 'dcms.other_menu_post';
        $this->view_path = 'dcms.other_menu_post';
        $data['lang']= $this->dm_post::getLanguage();
        $data['other'] = $this->dm_post::getOthers();
        return view(parent::loadView($this->view_path.'.create'), compact('data'));
    }
    public function storeOtherMenuPost(Request $request) {
      
        $data =  $request->all();
        $validator = Validator::make($data, [
            'rows.*.title' => 'nullable|max:225',
            'rows.*.description' => 'nullable',
            'images.*' => 'mimes:jpeg,jpg,png,gif|max:5000',  // Validate each image
            'file_title' => 'array|max:225',
            'status' => 'required|boolean' ,
            'other_menu' => 'required'
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
        $this->panel = 'Other Menu Post';
        $this->base_route = 'dcms.other_menu_post';
        $this->view_path = 'dcms.other_menu_post';
        if($this->model->storeData($request, $request->other_menu, $request->type, $request->rows, $request->images, $request->status, $request->file_title, $request->file)){
            session()->flash('alert-success', $this->panel.' Successfully Added');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be added');
        }
        return redirect()->route($this->base_route.'.index');
    }
    public function editOtherMenuPost(Request $request, $post_unique_id) {
        $this->tracker;
        $this->panel = 'Other Menu Post';
        $this->base_route = 'dcms.other_menu_post';
        $this->view_path = 'dcms.other_menu_post';
        $post = $this->model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['file'] = $this->file_model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['single'] = $this->model::where('post_unique_id', '=', $post_unique_id)->first();
        $data['lang'] = $this->dm_post::getLanguage();
        $data['others'] = $this->dm_post::getOther();
        $data['images'] = PostImage::where('post_unique_id',$post_unique_id)->get();

        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'post'));
    }
    public function updateOtherMenuPost(Request $request, $post_unique_id) {
        $data =  $request->all();
        $validator = Validator::make($data, [
            'rows.*.title' => 'nullable|max:225',
            'rows.*.description' => 'nullable',
            'images.*' => 'mimes:jpeg,jpg,png,gif|max:5000',  // Validate each image
            'file_title' => 'array|max:225',
            'status' => 'required|boolean' ,
            'other_menu' => 'required'
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
        $this->panel = 'Other Menu Post';
        $this->base_route = 'dcms.other_menu_post';
        $this->view_path = 'dcms.other_menu_post';
        if($this->model->updateData($request, $request->type, $request->rows, $request->images, $request->other_menu, $request->status, $request->file_title, $request->file, $post_unique_id)){
            session()->flash('alert-success', $this->panel.' Successfully updated');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be updated');
        }
        return redirect()->route($this->base_route.'.index');
    }

    public function deletedOtherMenuPost() {
        $this->tracker;
        $this->panel = 'Other Menu Post';
        $this->base_route = 'dcms.other_menu_post';
        $this->view_path = 'dcms.other_menu_post';
        $data['rows'] = OtherMenuPost::where('deleted_at', '!=', null)->where('type', '=', 'post')->where('lang_id', '=', $this->lang_id)->get();
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