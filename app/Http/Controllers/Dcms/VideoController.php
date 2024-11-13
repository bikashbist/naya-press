<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Video;

class VideoController extends DM_BaseController
{
    protected $panel = 'Videos';
    protected $base_route = 'dcms.video';
    protected $view_path = 'dcms.video';
    protected $model;
    protected $table;

    public function __construct(Request $request, Tracker $tracker, Video $video, DM_Post $dm_post)
    {
        $this->middleware('auth');
        $this->middleware('permission:video-list', ['only' => ['index']]);
        $this->middleware('permission:video-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:video-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:video-delete', ['only' => ['destroy']]);
        $this->model = $video;
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
        $data['rows'] = $this->model::where('lang_id', '=', $this->lang_id)->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //dd($request->all());
        $request->validate([
            'rows.*.video_title' => 'required|max:225',
            'video_url' => 'required',
            'status' => 'required|boolean',
            'featured' => 'required|boolean',
        ], [
            'rows.*.video_title.required' => 'You have to enter the name of video_title.',
        ]);
        if ($this->model->storeData($request->rows, $request->status, $request->featured, $request->video_url)) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($video_unique_id)
    {
        $videos = $this->model::where('video_unique_id', '=', $video_unique_id)->get();
        $data['lang'] = $this->dm_post::getLanguage();
        $data['single'] = $this->model::where('video_unique_id', '=', $video_unique_id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data', 'videos'));
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
       // dd($request->all());
        $request->validate([
            'rows.*.video_title' => 'required|max:225',
            'video_url' => 'required',
            'status' => 'required|boolean',
            'featured' => 'required|boolean',
        ], [
            'rows.*.video_title.required' => 'You have to enter the name of Video.',
        ]);
        if($this->model->updateData($request->video_unique_id, $request->rows,$request->featured, $request->status,  $request->video_url) ){
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
    public function destroy($video_unique_id)
    {
        $this->tracker;
        $data = $this->model::where('video_unique_id', '=', $video_unique_id)->get();
        foreach ($data as $row) {
            $row->delete();
        }
    }
}
