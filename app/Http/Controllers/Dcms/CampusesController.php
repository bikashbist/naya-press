<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Dcms\Campus;
use App\Model\Dcms\Province;
use App\User;
use App\Model\Dcms\File;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;
use Illuminate\Support\Str;
use Auth;
use DateTime;
use App\Model\Dcms\Tracker;

class CampusesController extends DM_BaseController
{
    protected $panel = "Campuses";
    protected $base_route = "dcms.campus";
    protected $view_path = "dcms.campus";
    protected $model;
    protected $table;

    public function __construct(Request $request, Campus $model, Province $model_2, DM_Post $dm_post, Tracker $tracker) {
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
        // $this->model_3 = $model_3;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = $this->model::where('lang_id', '=', $this->lang_id)->get();
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
        $data['lang']= $this->dm_post::getLanguage();
        $data['province'] = $this->model_2::all();
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
            // 'affiliated_id' => 'required',
            'status' => 'required|boolean' ,

        ], [
            'rows.*.title.required' => 'The  title is required (Language)',
            // 'affiliated_id.required' => 'Select Institute',
        ]);
        $this->tracker;
        if($this->model->storeData($request, $request->campus_type, $request->file, $request->rows, $request->status, $request->url, $request->type, $request->level, $request->province)){
            // dd($request->campus_type);

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
        $data['lang'] = $this->dm_post::getLanguage();
        $programs = $this->model::where('unique_id', '=', $unique_id)->get();
        $data['single'] = $this->model::where('unique_id', '=', $unique_id)->first();
        $data['province'] = $this->model_2::all();
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
            // 'affiliated_id' => 'required',
            'status' => 'required|boolean' ,
        ], [
            'rows.*.title.required' => 'The  title is required (Language)',
            // 'affiliated_id.required' => 'Select Institute',
        ]);
        $this->tracker;
        if($this->model->updateData($request, $request->unique_id, $request->id, $request->campus_type, $request->file, $request->rows, $request->status, $request->url, $request->type, $request->level, $request->province)){
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
}
