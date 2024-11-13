<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\AffiliatedProgramCategory;
use App\Model\Dcms\AffiliatedProgram;
use App\Model\Dcms\AffiliatedPage;
use App\Model\Dcms\AffiliatedFile;
use App\User;
use App\Model\Dcms\File;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;
use Illuminate\Support\Str;
use Auth;
use DateTime;
use App\Model\Dcms\Tracker;

class AffiliatedProgramController extends DM_BaseController
{
    protected $panel = "Program";
    protected $base_route = "dcms.institute.program";
    protected $view_path = "dcms.institute.program";
    protected $model;
    protected $table;

    public function __construct(Request $request, AffiliatedProgram $model, AffiliatedProgramCategory $model_2, AffiliatedPage $model_3, DM_Post $dm_post, Tracker $tracker) {
        $this->middleware('auth');
        // $this->middleware('permission:affiliated-list', ['only' => ['index']]);
        // $this->middleware('permission:affiliated-create', ['only' => ['create','store']]);
        // $this->middleware('permission:affiliated-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:affiliated-delete', ['only' => ['destroy']]);
        $this->model = $model;
        // $this->table = DB::table('posts');
        $this->dm_post = $dm_post;
        $this->lang_id = $dm_post::setLanguage();
        $this->tracker = $tracker::hit();
        $this->model_2 = $model_2;
        $this->model_3 = $model_3;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = $this->model::where('lang_id', '=', $this->lang_id)->where('type', '=', 'institute')->get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->tracker;
        $data['category'] = $this->model_2::all();
        $data['institute'] = $this->model_3::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->get();
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
            'rows.*.description' => 'required',
            'affiliated_id' => 'required',
            'status' => 'required|boolean' ,
        ], [
            'rows.*.title.required' => 'The title is required (Language)',
            'rows.*.description.required' => 'The description is required (Language)',
            'affiliated_id.required' => 'Select Institute',
        ]);
        $this->tracker;
        if($this->model->storeData($request, $request->affiliated_id, $request->category_id, $request->file, $request->rows, $request->status, $request->type)){
            session()->flash('alert-success', $this->panel.' Successfully updated');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be updated');
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
        $this->tracker;
        $data['category'] = $this->model_2::all();
        $data['institute'] = $this->model_3::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->where('type', '=', 'institute')->get();
        $data['lang'] = $this->dm_post::getLanguage();
        $programs = $this->model::where('unique_id', '=', $unique_id)->get();
        $data['single'] = $this->model::where('unique_id', '=', $unique_id)->first();
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'programs'));
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
            'rows.*.description' => 'required',
            'affiliated_id' => 'required',
            'status' => 'required|boolean' ,
        ], [
            'rows.*.title.required' => 'The title is required (Language)',
            'rows.*.description.required' => 'The description is required (Language)',
            'affiliated_id.required' => 'Select Institute',
        ]);
        $this->tracker;
        if($this->model->updateData($request, $request->unique_id, $request->affiliated_id, $request->category_id, $request->file, $request->rows, $request->status, $request->type)){
            session()->flash('alert-success', $this->panel.' Successfully updated');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be updated');
        }
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($unique_id)
    {
        $this->tracker;
        $data = $this->model::where('unique_id', '=', $unique_id)->get();
        foreach( $data as $row) {
            $row->delete();
        }
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProgram()
    {
        $this->base_route = "dcms.faculty.program";
        $this->view_path = "dcms.faculty.program";
        $data['rows'] = $this->model::where('lang_id', '=', $this->lang_id)->where('type', '=', 'faculty')->get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createProgram()
    {
        $this->base_route = "dcms.faculty.program";
        $this->view_path = "dcms.faculty.program";
        $this->tracker;
        $data['category'] = $this->model_2::all();
        $data['institute'] = $this->model_3::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->where('type', '=', 'faculty')->get();
        $data['lang']= $this->dm_post::getLanguage();
        return view(parent::loadView($this->view_path.'.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProgram(Request $request)
    {
        $this->base_route = "dcms.faculty.program";
        $this->view_path = "dcms.faculty.program";
        $request->validate([
            'rows.*.title' => 'required|max:225',
            'rows.*.description' => 'required',
            'affiliated_id' => 'required',
            'status' => 'required|boolean',
        ], [
            'rows.*.title.required' => 'The title is required (Language)',
            'rows.*.description.required' => 'The description is required (Language)',
            'affiliated_id.required' => 'Select Faculty',
        ]);
        $this->tracker;
        if($this->model->storeData($request, $request->affiliated_id, $request->category_id, $request->file, $request->rows, $request->status, $request->type)){
            session()->flash('alert-success', $this->panel.' Successfully updated');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be updated');
        }
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProgram($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProgram($unique_id)
    {
        $this->base_route = "dcms.faculty.program";
        $this->view_path = "dcms.faculty.program";
        $this->tracker;
        $data['category'] = $this->model_2::all();
        $data['institute'] = $this->model_3::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->where('type', '=', 'faculty')->get();
        $data['lang'] = $this->dm_post::getLanguage();
        $programs = $this->model::where('unique_id', '=', $unique_id)->get();
        $data['single'] = $this->model::where('unique_id', '=', $unique_id)->first();
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProgram(Request $request, $id)
    {
        $this->base_route = "dcms.faculty.program";
        $this->view_path = "dcms.faculty.program";
        $request->validate([
            'rows.*.title' => 'required|max:225',
            'rows.*.description' => 'required',
            'affiliated_id' => 'required',
            'user' => 'required'
        ], [
            'rows.*.title.required' => 'The title is required (Language)',
            'rows.*.description.required' => 'The description is required (Language)',
            'affiliated_id.required' => 'Select Faculty',
        ]);
        $this->tracker;
        if($this->model->updateData($request, $request->unique_id, $request->affiliated_id, $request->category_id, $request->file, $request->rows, $request->status, $request->type)){
            session()->flash('alert-success', $this->panel.' Successfully updated');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be updated');
        }
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyProgram($unique_id)
    {
        $this->base_route = "dcms.faculty.program";
        $this->view_path = "dcms.faculty.program";
        $this->tracker;
        $data = $this->model::where('unique_id', '=', $unique_id)->get();
        foreach( $data as $row) {
            $row->delete();
        }
    }
}
