<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Slider;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;

class SlidersController extends DM_BaseController
{
    protected $model;
    protected $view_path = 'dcms.slider';
    protected $base_route = 'dcms.slider';
    protected $panel = 'Sliders';
    protected $folder = 'slider';

    public function __construct(Slider $slider, DM_Post $dm_post, Tracker $tracker) {
        $this->middleware('auth');
        $this->middleware('permission:slider-list', ['only' => ['index']]);
        $this->middleware('permission:slider-create',['only' => ['create','store']]);
        $this->middleware('permission:slider-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
        $this->model = $slider;
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
            'name'=> 'required',
            'rows.*.lang_name' => 'required|max:225',
            'image' => 'mimes:jpeg,jpg,png,gif|max:50000',
        ], [
            'rows.*.lang_name.required' => 'The Slider title is required (Language)',
        ]);
        $this->tracker;
        if($this->model->storeData($request, $request->image, $request->name, $request->rows)){
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
        $data['slider'] = $this->model::findOrFail($id);
        $data['slider_name'] = DB::table('sliders_name')->where('slider_id', '=', $id)->get();
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
            'name'=> 'required',
            'rows.*.lang_name' => 'required|max:225',
            'image' => 'mimes:jpeg,jpg,png,gif|max:50000',
        ], [
            'rows.*.lang_name.required' => 'The Slider title is required (Language)',
        ]);
        $this->tracker;
        if($this->model->updateData($request, $id, $request->image, $request->name, $request->rows)){
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
        $row = $this->model::findOrFail($id);
        $file_path = getcwd(). $row->image;
        if(is_file($file_path)){
            unlink($file_path);
        }
        $this->model::destroy($id);
        
    }
}
