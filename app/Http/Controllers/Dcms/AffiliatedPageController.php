<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\AffiliatedPage;
use App\Model\Dcms\AffiliatedFile;
use App\Model\Dcms\AffiliatedCollage;
use App\Model\Dcms\AffiliatedProgram;
use App\Model\Dcms\AffiliatedStaff;
use App\Model\Dcms\AffiliatedBanner;
use App\User;
use App\Model\Dcms\File;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;
use Illuminate\Support\Str;
use Auth;
use DateTime;
use App\Model\Dcms\Tracker;

class AffiliatedPageController extends DM_BaseController
{

    protected $panel = "Institute";
    protected $base_route = "dcms.institute";
    protected $view_path = "dcms.institute";
    protected $model;
    protected $table;

    public function __construct(Request $request, AffiliatedPage $model, AffiliatedFile $model_file, DM_Post $dm_post, Tracker $tracker) {
        $this->middleware('auth');
        $this->middleware('permission:affiliated-list', ['only' => ['index']]);
        $this->middleware('permission:affiliated-create', ['only' => ['create','store']]);
        $this->middleware('permission:affiliated-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:affiliated-delete', ['only' => ['destroy']]);
        $this->model = $model;
        $this->table = DB::table('posts');
        $this->dm_post = $dm_post;
        $this->lang_id = $dm_post::setLanguage();
        $this->tracker = $tracker::hit();
        $this->model_file = $model_file;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = $this->model::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->where('type', '=', 'institute')->get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['user'] = User::where('role_super', '=', '1')->where('status', '=', 1)->get();
        $data['lang']= $this->dm_post::getLanguage();
        return view(parent::loadView($this->view_path.'.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rows.*.title' => 'required|max:225',
            'rows.*.content' => 'required',
            'user' => 'required',
            'status' => 'required|boolean' ,
        ], [
            'rows.*.title.required' => 'The title is required (Language)',
            'rows.*.content.required' => 'The description is required (Language)',
        ]);
        if($this->model->storeData($request, $request->user, $request->rows, $request->image, $request->tag, $request->status, $request->file_title, $request->file, $request->url, $request->type)){
            session()->flash('alert-success', $this->panel.' Successfully Added');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be added');
        }
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($unique_id)
    {
        $post = $this->model::where('unique_id', '=', $unique_id)->get();
        $data['single'] = $this->model::where('unique_id', '=', $unique_id)->first();
        $data['file'] = $this->model_file::where('unique_id', '=', $unique_id)->get();
        $data['user'] = User::where('status', '=', 1)->get();
        $data['lang'] = $this->dm_post::getLanguage();
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rows.*.title' => 'required|max:225',
            'rows.*.content' => 'required',
            'user' => 'required',
            'status' => 'required|boolean' ,
        ], [
            'rows.*.title.required' => 'The title is required (Language)',
            'rows.*.content.required' => 'The description is required (Language)',
        ]);
        if($this->model->updateData($request, $request->user, $request->rows, $request->image, $request->tag, $request->status, $request->file_title, $request->file, $request->unique_id,  $request->url, $request->type)){
            session()->flash('alert-success', $this->panel.' Successfully updated');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be updated');
        }
        if(Auth::user()->role == "affiliated"){
            return redirect()->route($this->base_route.'.get_page');
        }
        else{
            return redirect()->route($this->base_route.'.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($unique_id) {
        $this->tracker;
        $data = $this->model::where('unique_id', '=', $unique_id)->get();
        foreach( $data as $row) {
            $row->deleted_at = new DateTime();
            $row->save();
        }
    }

    public function destroyFile($id) {
        $this->tracker;
        $row = $this->model_file::findOrFail($id);
        $file_path = getcwd(). $row->file;
        if(is_file($file_path)){
            unlink($file_path);
        }
        $data = $this->model_file::destroy($id);
    }

    public function deletedInstitute() {
        $this->tracker;
        $data['rows'] = $this->model::where('deleted_at', '!=', null)->where('type', '=', 'institute')->where('lang_id', '=', $this->lang_id)->get();
        return view(parent::loadView($this->view_path.'.deleted'), compact('data'));

    }

    public function getPage() {
        $data['rows'] = $this->model::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->where('user_id', '=', Auth::user()->id)->get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    public function indexFaculty() {
        $this->panel = "Faculty";
        $this->base_route = "dcms.faculty";
        $this->view_path = "dcms.faculty";
        $data['rows'] = $this->model::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->where('type', '=', 'faculty')->get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    public function createFaculty() {
        $this->panel = "Faculty";
        $this->base_route = "dcms.faculty";
        $this->view_path = "dcms.faculty";
        $data['user'] = User::where('role_super', '=', '1')->where('status', '=', 1)->get();
        $data['lang']= $this->dm_post::getLanguage();
        return view(parent::loadView($this->view_path.'.create'), compact('data'));
    }

    public function storeFaculty(Request $request) {
        $request->validate([
            'rows.*.title' => 'required|max:225',
            'rows.*.content' => 'required',
            'user' => 'required',
            'status' => 'required|boolean' ,
        ], [
            'rows.*.title.required' => 'The title is required (Language)',
            'rows.*.content.required' => 'The description is required (Language)',
        ]);
        $this->panel = "Faculty";
        $this->base_route = "dcms.faculty";
        $this->view_path = "dcms.faculty";
        if($this->model->storeData($request, $request->user, $request->rows, $request->image, $request->tag, $request->status, $request->file_title, $request->file, $request->url, $request->type)){
            session()->flash('alert-success', $this->panel.' Successfully Added');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be added');
        }
        return redirect()->route($this->base_route.'.index');
    }

    public function editFaculty($unique_id) {
        $this->panel = "Faculty";
        $this->base_route = "dcms.faculty";
        $this->view_path = "dcms.faculty";
        $post = $this->model::where('unique_id', '=', $unique_id)->get();
        $data['single'] = $this->model::where('unique_id', '=', $unique_id)->first();
        $data['file'] = $this->model_file::where('unique_id', '=', $unique_id)->get();
        $data['user'] = User::where('status', '=', 1)->get();
        $data['lang'] = $this->dm_post::getLanguage();
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'post'));
    }

    public function updateFaculty(Request $request, $id) {
        $request->validate([
            'rows.*.title' => 'required|max:225',
            'rows.*.content' => 'required',
            'user' => 'required',
            'status' => 'required|boolean' ,
        ], [
            'rows.*.title.required' => 'The title is required (Language)',
            'rows.*.content.required' => 'The description is required (Language)',
        ]);
        $this->panel = "Faculty";
        $this->base_route = "dcms.faculty";
        $this->view_path = "dcms.faculty";
        if($this->model->updateData($request, $request->user, $request->rows, $request->image, $request->tag, $request->status, $request->file_title, $request->file, $request->unique_id,  $request->url, $request->type)){
            session()->flash('alert-success', $this->panel.' Successfully updated');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be updated');
        }
        if(Auth::user()->role == "affiliated"){
            return redirect()->route($this->base_route.'.get_page');
        }
        else{
            return redirect()->route($this->base_route.'.index');
        }
    }

    public function destroyFaculty($unique_id) {
        $this->tracker;
        $data = $this->model::where('unique_id', '=', $unique_id)->get();
        foreach( $data as $row) {
            $row->deleted_at = new DateTime();
            $row->save();
        }
    }

    public function restore($unique_id) {
        $this->tracker;
        $data = $this->model::where('unique_id', '=', $unique_id)->get();
        foreach( $data as $row) {
            $row->deleted_at = null;
            $row->save();
        }
    }

    public function permanentDelete($unique_id) {
        $this->tracker;
        AffiliatedFile::where('unique_id', '=', $unique_id)->delete();
        AffiliatedBanner::where('affiliated_id', '=', $unique_id)->delete();
        AffiliatedCollage::where('affiliated_id', '=', $unique_id)->delete();
        AffiliatedProgram::where('affiliated_id', '=', $unique_id)->delete();
        AffiliatedStaff::where('affiliated_id', '=', $unique_id)->delete();
        $this->model::where('unique_id', '=', $unique_id)->delete();
    }

    public function deletedFaculty() {
        $this->tracker;
        $data['rows'] = $this->model::where('deleted_at', '!=', null)->where('type', '=', 'faculty')->where('lang_id', '=', $this->lang_id)->get();
        return view(parent::loadView($this->view_path.'.deleted'), compact('data'));
    }


}
