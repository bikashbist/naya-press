<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Dcms\Audio;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\Popup;
use App\Model\Dcms\Tracker;

class AudioController extends DM_BaseController
{
    protected $model;
    protected $view_path = 'dcms.audio';
    protected $base_route = 'dcms.audio';
    protected $panel = 'Audio';
    protected $folder = 'audio';

    public function __construct(Audio $audio, DM_Post $dm_post, Tracker $tracker)
    {
        $this->folder = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;

        $this->middleware('auth');
        $this->middleware('permission:slider-list', ['only' => ['index']]);
        $this->middleware('permission:slider-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:slider-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:slider-delete', ['only' => ['destroy']]);
        $this->model = $audio;
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
        return view(Parent::loadView($this->view_path . '.index'), compact('data'));
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
            'file' => 'required|mimes:mp3,mp4,3gb,mpga,wav,audio',
            'status' => 'required|boolean',
        ],);

        $data           =  new Audio();
        $data->name     =  $request->get('name');
        $data->status   =  $request->get('status');

        if ($request->hasFile('file')) {
            $this->createFolder($this->folder);
            $audio      = $request->file('file');
            $filename   = $audio->getClientOriginalName();
            $audio->move($this->folder, $filename);
            $data->file           = $filename;
        }

        $success = $data->save();
        if ($success) {
            session()->flash('alert-success', $this->panel . ' Successfully updated');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be updated');
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
        $data['single'] = $this->model::findOrFail($id);
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
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
        $data = $this->model->findOrFail($id);
        $request->validate([
            'name' => 'required|max:225',
            'file' => 'sometimes|mimes:mp3,mp4,3gb,mpga,wav,audio',
            'status' => 'required|boolean',
        ],);
        $data->name     =  $request->get('name');
        $data->status   =  $request->get('status');

        if ($request->hasFile('file')) {
            $file_path = $this->folder . $data->file;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $file_path = $this->folder . $data->file;
            $this->createFolder($this->folder);
            $audio      = $request->file('file');
            $filename   = $audio->getClientOriginalName();
            $audio->move($this->folder, $filename);
            $data->file           = $filename;
        }
        $success = $data->save();

        if ($success) {
            session()->flash('alert-success', $this->panel . ' Successfully updated');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be updated');
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
        $file_path = $this->folder . $row->file;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $this->model::destroy($id);
    }
}
