<?php

namespace App\Http\Controllers\Dcms;

use App\Model\Dcms\SuccessStory;
use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;

class SuccessStoryController extends DM_BaseController
{
    protected $model;
    protected $view_path = 'dcms.success_story';
    protected $base_route = 'dcms.success_story';
    protected $panel = 'Success_storys';
    protected $folder = 'success_story';

    public function __construct(SuccessStory $success_story, DM_Post $dm_post, Tracker $tracker) {
        $this->middleware('auth');
        $this->middleware('permission:success_story-list', ['only' => ['index']]);
        $this->middleware('permission:success_story-create',['only' => ['create','store']]);
        $this->middleware('permission:success_story-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:success_story-delete', ['only' => ['destroy']]);
        $this->model = $success_story;
        $this->dm_post = $dm_post;
        $this->lang_id = $dm_post::setLanguage();
        $this->tracker = $tracker::hit();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->tracker;
        $data['rows'] = $this->model::all();
        return view(Parent::loadView($this->view_path.'.index'), compact('data'));
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
            'students'=> 'nullable||string',
            'online'=> 'nullable||string',
            'premimum'=> 'nullable||string',
            'teachers'=> 'nullable||string',
        ]);
        $this->tracker;
        if($this->model->storeData($request->students, $request->online, $request->premimum, $request->teachers)){
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
    public function edit($id)
    {
        $this->tracker;
        $data['lang'] = $this->dm_post::getLanguage();
        $data['msg'] = $this->model::findOrFail($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));    
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
            'students'=> 'nullable||string',
            'online'=> 'nullable||string',
            'premimum'=> 'nullable||string',
            'teachers'=> 'nullable||string',
        ]);
        $this->tracker;
        if($this->model->updateData( $id,$request->students, $request->online, $request->premimum, $request->teachers)){
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
    public function destroy($id)
    {
        $this->tracker;
        $this->model::destroy($id);
        
    }
}
