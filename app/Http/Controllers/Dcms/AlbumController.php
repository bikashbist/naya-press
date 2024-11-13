<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Album;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;

class AlbumController extends DM_BaseController
{
    protected $panel = 'Album';
    protected $base_route = 'dcms.album';
    protected $view_path = 'dcms.album';
    protected $model;
    protected $table;

    public function __construct(Request $request, Tracker $tracker, Album $album, DM_Post $dm_post)
    {
        $this->middleware('auth');
        $this->middleware('permission:album-list', ['only' => ['index']]);
        $this->middleware('permission:album-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:album-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:album-delete', ['only' => ['destroy']]);
        $this->model = $album;
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
        $data['rows'] = $this->model->joinAlbum($this->lang_id);
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->tracker;
        $data['lang'] = $this->dm_post::getLanguage();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
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
            'name' => 'required|max:225',
            'rows.*.name' => 'required|max:225',
            'status' => 'required|boolean',
            'order' => 'nullable',
            'image' => 'mimes:jpeg,jpg,png,gif|max:50000',
        ], [
            'rows.*.name.required' => 'You have to enter the name of Album',
        ]);
        if ($this->model->storeData($request, $request->name, $request->rows, $request->image, $request->status, $request->order)) {
            session()->flash('alert-success', $this->panel . ' Successfully Store');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be Store');
        }
        return redirect()->route($this->base_route . '.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = $this->model::findOrFail($id);
        $albums_name = DB::table('albums_name')->where('album_id', '=', $id)->where('lang_id', $this->lang_id)->first();
        return view(parent::loadView($this->view_path . '.show'), compact('row', 'albums_name'));
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
        $data['albums'] = $this->model::findOrFail($id);
        $albums_name = DB::table('albums_name')->where('album_id', '=', $id)->get();
        return view(parent::loadView($this->view_path . '.edit'), compact('data', 'albums_name'));
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
            'name' => 'required|max:225',
            'rows.*.name' => 'required|max:225',
            'status' => 'required|boolean',
            'order' => 'nullable',
            'image' => 'mimes:jpeg,jpg,png,gif|max:50000',
        ], [
            'rows.*.name.required' => 'You have to enter the name of Album',
        ]);
        if ($this->model->updateData($request, $id, $request->name, $request->rows, $request->image, $request->status, $request->order)) {
            session()->flash('alert-success', $this->panel . ' Successfully Store');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be Store');
        }
        return redirect()->route($this->base_route . '.index');
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
        $file_path = getcwd() . $row->cover_image;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $this->model->destroy($id);
    }
}
