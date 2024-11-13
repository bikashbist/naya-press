<?php

namespace App\Http\Controllers\Dcms;

use App\Model\Dcms\Advistement;
use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Popup;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;

class AdvistementController extends DM_BaseController
{
    protected $panel = 'Advistement';
    protected $base_route = 'dcms.advistement';
    protected $view_path ='dcms.advistement';
    protected $model;
    protected $table;

    public function __construct(Request $request, Tracker $tracker, Advistement $advistement, DM_Post $dm_post) {
        $this->middleware('auth');
        $this->middleware('permission:advistement-list', ['only' => ['index']]);
        $this->middleware('permission:advistement-create', ['only' => ['create','store']]);
        $this->middleware('permission:advistement-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:advistement-delete', ['only' => ['destroy']]);
        $this->model = $advistement;
        $this->tracker = $tracker::hit();
        $this->dm_post = $dm_post;
        $this->lang_id = $dm_post::setLanguage();

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
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        if($this->model->storeData($request, $request->image, $request->title, $request->url, $request->rank, $request->status ) ){
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
    public function edit($id)
    {
        $links = $this->model::where('id', '=', $id)->get();
        $data['lang'] = $this->dm_post::getLanguage();
        $data['single'] = $this->model::where('id', '=', $id)->first();
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
        if($this->model->updateData($request, $id, $request->image, $request->title, $request->url, $request->rank, $request->status ) ){
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
    public function destroy($id)
    {
        // Find the Advistement record by ID
        $advistement = $this->model::findOrFail($id);
    
        // Delete the record
        if ($advistement->delete()) {
            session()->flash('alert-success', 'Advistement deleted successfully');
        } else {
            session()->flash('alert-danger', 'Failed to delete Advistement');
        }
    
        // Redirect to the index page
        return redirect()->route($this->base_route . '.index');
    }
}
