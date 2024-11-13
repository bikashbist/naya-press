<?php

namespace App\Http\Controllers\Dcms;

use App\Model\Dcms\PopupImage;
use App\Model\Dcms\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\File;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\Tracker;

class PopupImageController extends DM_BaseController
{
    protected $panel = 'PopupImage';
    protected $base_route = 'dcms.popup_image';
    protected $view_path = 'dcms.popup_image';
    protected $model;

    public function __construct(Tracker $tracker, PopupImage $popup_image, DM_Post $dm_post) {
        $this->middleware('auth');
        $this->middleware('permission:popup_image-list', ['only' => ['index']]);
        $this->middleware('permission:popup_image-create', ['only' => ['create','store']]);
        $this->middleware('permission:popup_image-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:popup_image-delete', ['only' => ['destroy']]);
        $this->model = new $popup_image;
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
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $row = $this->model::findOrFail($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('row'));
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
        $this->tracker;
        $row = $this->model::findOrFail($id);
        $row->save();
        session()->flash('alert-success', $this->panel.' was successfully Updated');
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
        $file_path = getcwd(). $row->images;
        if(is_file($file_path)){
            unlink($file_path);
        }
        $this->model::destroy($id);
    }
}
