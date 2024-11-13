<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\Gallery;
use DB;

class GalleryController extends DM_BaseController
{
    protected $panel = 'Gallery';
    protected $base_route = 'dcms.gallery';
    protected $view_path ='dcms.gallery';
    protected $model;
    protected $table;
    protected $folder = 'gallery';
    protected $image_name = 'file';

    protected $image_prefix_path = '/upload_file/images/gallery/';

    public function __construct(Tracker $tracker, DM_Post $dm_post) {
        $this->middleware('auth');
        $this->middleware('permission:gallery-list', ['only' => ['index']]);
        $this->middleware('permission:gallery-create', ['only' => ['create','store']]);
        $this->middleware('permission:gallery-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:gallery-delete', ['only' => ['destroy']]);
        $this->model = new Gallery;
        $this->table = DB::table('gallery');
        $this->tracker = $tracker::hit();
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
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
    public function create($album_id)
    {
        $this->tracker;
        return view(parent::loadView($this->view_path.'.create'), compact('album_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $album_id)
    {
        $file = $request->file('file');
        if($file = $request->hasFile('file')){
            $image_path = parent::uploadImage($request, $this->folder_path,$this->image_prefix_path,$this->image_name,'');
        }
        $row = $this->model;
        $row->album_id = $album_id;
        $row->image = $image_path;
        $row->title = 'Photo title goes here';
        $row->save();
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
        ]);
        $row = $this->model::findOrFail($id);
        $row->title = $request->title;
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
        $file_path = getcwd(). $row->image;
        if(is_file($file_path)){
            unlink($file_path);
        }
        $this->model->destroy($id);
    }
}
