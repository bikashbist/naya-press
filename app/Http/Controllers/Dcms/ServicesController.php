<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Service;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;
use App\DM_Libraries\Spyc;

class ServicesController extends DM_BaseController
{
    protected $panel = 'Services';
    protected $base_route = 'dcms.service';
    protected $view_path ='dcms.service';
    protected $model;
    protected $table;

    public function __construct(Service $service, Tracker $tracker, DM_Post $dm_post) {
        $this->middleware('auth');
        $this->middleware('permission:service-list', ['only' => ['index']]);
        $this->middleware('permission:service-create', ['only' => ['create','store']]);
        $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:service-delete', ['only' => ['destroy']]);
        $this->model = $service;
        $this->tracker = $tracker::hit();
        $this->lang_id = $dm_post::setLanguage();
        $this->dm_post = $dm_post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->tracker;
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
        $spyc = new Spyc();
        $icons = $spyc::YAMLLoad(app_path()."/DM_Treasure/icons.yml");
        $data['fa-icons'] = $icons["fa"];
        $data['lang'] = $this->dm_post::getLanguage();
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
            'link' => 'url|required',
            'status' => 'required|boolean',
            'order' => 'numeric|nullable'
        ], [
            'rows.*.title.required' => 'You have to enter the name of Service.',
        ]);
        if($this->model->storeData($request->icon, $request->color, $request->rows, $request->link, $request->order, $request->status ) ){
            session()->flash('alert-success', $this->panel.' Successfully Store');
        }else {
            session()->flash('alert-danger', $this->panel.' can not be Store');
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
    public function edit($service_unique_id)
    {
        $spyc = new Spyc();
        $icons = $spyc::YAMLLoad(app_path()."/DM_Treasure/icons.yml");
        $data['fa-icons'] = $icons["fa"];
        $links = $this->model::where('service_unique_id', '=', $service_unique_id)->get();
        $data['lang'] = $this->dm_post::getLanguage();
        $data['single'] = $this->model::where('service_unique_id', '=', $service_unique_id)->first();
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'links')); 
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
            'link' => 'url|required',
            'status' => 'required|boolean',
            'order' => 'numeric|nullable'
        ], [
            'rows.*.title.required' => 'You have to enter the name of Service.',
        ]);
        if($this->model->updateData($request->service_unique_id, $request->icon, $request->color, $request->rows, $request->link, $request->order, $request->status ) ){
            session()->flash('alert-success', $this->panel.' Successfully Store');
        }else {
            session()->flash('alert-danger', $this->panel.' can not be Store');
        }
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($service_unique_id)
    {
        $this->tracker;
        $data = $this->model::where('service_unique_id', '=', $service_unique_id)->get();
        foreach( $data as $row) {
            $row->delete();
        }
    }
}
