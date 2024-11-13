<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\File;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\Tracker;

class FilesController extends DM_BaseController
{
    protected $panel = 'File';
    protected $base_route = 'dcms.file';
    protected $view_path = 'dcms.file';
    protected $model;

    public function __construct(Tracker $tracker, File $file, DM_Post $dm_post) {
        $this->middleware('auth');
        $this->middleware('permission:post-file-list', ['only' => ['index']]);
        $this->middleware('permission:post-file-create', ['only' => ['create','store']]);
        $this->middleware('permission:post-file-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:post-file-delete', ['only' => ['destroy']]);
        $this->model = new $file;
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
        $request->validate([
            'title' => 'required|max:225',
            'order' => 'numeric|nullable',
        ]);
        $row = $this->model::findOrFail($id);
        $row->title = $request->title;
        $row->order = $request->order;
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
        $file_path = getcwd(). $row->file;
        if(is_file($file_path)){
            unlink($file_path);
        }
        $this->model::destroy($id);
    }
}
