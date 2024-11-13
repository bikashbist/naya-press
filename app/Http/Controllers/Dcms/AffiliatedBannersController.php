<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Dcms\AffiliatedBanner;
use App\Model\Dcms\AffiliatedPage;
use App\Model\Dcms\AffiliatedFile;
use App\User;
use App\Model\Dcms\File;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;
use Illuminate\Support\Str;
use Auth;
use DateTime;
use App\Model\Dcms\Tracker;

class AffiliatedBannersController extends DM_BaseController
{
    protected $panel = "Banner";
    protected $base_route = "dcms.institute.banner";
    protected $view_path = "dcms.institute.banner";
    protected $model;
    protected $table;

    public function __construct(Request $request, AffiliatedBanner $model, AffiliatedPage $model_2, DM_Post $dm_post, Tracker $tracker) {
        $this->middleware('auth');
        // $this->middleware('permission:affiliated-list', ['only' => ['index']]);
        // $this->middleware('permission:affiliated-create', ['only' => ['create','store']]);
        // $this->middleware('permission:affiliated-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:affiliated-delete', ['only' => ['destroy']]);
        $this->model = $model;
        // $this->table = DB::table('posts');
        $this->dm_post = $dm_post;
        $this->lang_id = $dm_post::setLanguage();
        $this->tracker = $tracker::hit();
        $this->model_page = $model_2;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = $this->model::where('lang_id', '=', $this->lang_id)->where('type', '=', 'institute')->get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->tracker;
        $data['institute'] = $this->model_page::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->get();
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
            'rows.*.title' => 'required|max:225',
            'image' => 'required|image',
            'institute' => 'required',
        ], [
            'rows.*.title.required' => 'The Slider title is required (Language)',
            'institute.required' => 'Select Institute',
        ]);
        $this->tracker;
        if($this->model->storeData($request, $request->image, $request->name, $request->rows, $request->institute, $request->type)){
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
    public function edit($unique_id)
    {
        $this->tracker;
        $data['institute'] = $this->model_page::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->where('type', '=', 'institute')->get();
        $data['lang'] = $this->dm_post::getLanguage();
        $banner = $this->model::where('unique_id', '=', $unique_id)->get();
        $data['single'] = $this->model::where('unique_id', '=', $unique_id)->first();
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $unique_id)
    {
        $request->validate([
            'rows.*.name' => 'required|max:225',
            'image' => 'image',
            'institute' => 'required',
        ], [
            'rows.*.name.required' => 'The Slider title is required (Language)',
            'institute.required' => 'Select Institute',
        ]);
        $this->tracker;
        if($this->model->updateData($request, $unique_id, $request->image, $request->rows, $request->institute, $request->type)){
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
    public function destroy($unique_id)
    {
        $this->tracker;
        $data = $this->model::where('unique_id', '=', $unique_id)->get();
        foreach( $data as $row) {
            $row->delete();
        }
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBanner()
    {
        $this->panel = "Banner";
        $this->base_route = "dcms.faculty.banner";
        $this->view_path = "dcms.faculty.banner";
        $data['rows'] = $this->model::where('lang_id', '=', $this->lang_id)->where('type', '=', 'faculty')->get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBanner()
    {
        $this->panel = "Banner";
        $this->base_route = "dcms.faculty.banner";
        $this->view_path = "dcms.faculty.banner";
        $this->tracker;
        $data['institute'] = $this->model_page::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->where('type', '=', 'faculty')->get();
        $data['lang']= $this->dm_post::getLanguage();
        return view(parent::loadView($this->view_path.'.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBanner(Request $request)
    {
        $this->panel = "Banner";
        $this->base_route = "dcms.faculty.banner";
        $this->view_path = "dcms.faculty.banner";
        $request->validate([
            'rows.*.name' => 'required|max:225',
            'image' => 'image',
            'institute' => 'required',
            // 'status' => 'required|boolean' ,
        ], [
            'rows.*.name.required' => 'The Slider title is required (Language)',
            'institute.required' => 'Select Faculty',

        ]);
        $this->tracker;
        if($this->model->storeData($request, $request->image, $request->name, $request->rows, $request->institute, $request->type)){
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
    public function showBanner($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editBanner($unique_id)
    {
        $this->panel = "Banner";
        $this->base_route = "dcms.faculty.banner";
        $this->view_path = "dcms.faculty.banner";
        $this->tracker;
        $data['institute'] = $this->model_page::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->where('type', '=', 'faculty')->get();
        $data['lang'] = $this->dm_post::getLanguage();
        $banner = $this->model::where('unique_id', '=', $unique_id)->get();
        $data['single'] = $this->model::where('unique_id', '=', $unique_id)->first();
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBanner(Request $request, $unique_id)
    {
        $this->panel = "Banner";
        $this->base_route = "dcms.faculty.banner";
        $this->view_path = "dcms.faculty.banner";
        $request->validate([
            'rows.*.name' => 'required|max:225',
            'image' => 'image',
            // 'status' => 'required|boolean' ,
            'institute' => 'required',
        ], [
            'rows.*.name.required' => 'The Slider title is required (Language)',
            'institute.required' => 'Select Faculty',
        ]);
        $this->tracker;
        if($this->model->updateData($request, $unique_id, $request->image, $request->rows,$request->institute, $request->type)){
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
    public function destroyBanner($unique_id)
    {
        $this->panel = "Banner";
        $this->base_route = "dcms.faculty.banner";
        $this->view_path = "dcms.faculty.banner";
        $this->tracker;
        $data = $this->model::where('unique_id', '=', $unique_id)->get();
        foreach( $data as $row) {
            $row->delete();
        }
    }
}
