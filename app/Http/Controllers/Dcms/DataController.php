<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Data;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\ScholarshipData;
use App\Model\Dcms\SchoolsData;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;
use App\DM_Libraries\Spyc;

class DataController extends DM_BaseController
{
    protected $panel = 'Data';
    protected $base_route = 'dcms.data';
    protected $view_path ='dcms.data';
    protected $model;
    protected $table;

    public function __construct(Tracker $tracker, DM_Post $dm_post, Data $data) {
        $this->middleware('auth');
        $this->middleware('permission:data-list', ['only' => ['index']]);
        $this->middleware('permission:data-create', ['only' => ['create','store']]);
        $this->middleware('permission:data-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:data-delete', ['only' => ['destroy']]);
        $this->model = $data;
        $this->dm_post = $dm_post;
        $this->tracker = $tracker::hit();
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
            // 'icon' => 'required',
            'data' => 'required',
            'status' => 'required|boolean',
            'order' => 'numeric|nullable'
        ], [
            'rows.*.name.required' => 'You have to enter the name of Link.',
        ]);
        if($this->model->storeData($request->rows, $request->status, $request->order, $request->icon, $request->data ) ){
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
    public function edit($data_unique_id)
    {
        $spyc = new Spyc();
        $icons = $spyc::YAMLLoad(app_path()."/DM_Treasure/icons.yml");
        $data['fa-icons'] = $icons["fa"];
        $links = $this->model::where('data_unique_id', '=', $data_unique_id)->get();
        $data['lang'] = $this->dm_post::getLanguage();
        $data['single'] = $this->model::where('data_unique_id', '=', $data_unique_id)->first();
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
            // 'icon' => 'required',
            'data' => 'required',
            'status' => 'required|boolean',
            'order' => 'numeric|nullable'
        ], [
            'rows.*.title.required' => 'You have to enter the name of Link.',
        ]);
        if($this->model->updateData($request->data_unique_id, $request->rows, $request->status, $request->order, $request->icon, $request->data ) ){
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
    public function destroy($data_unique_id)
    {
        $this->tracker;
        $data = $this->model::where('data_unique_id', '=', $data_unique_id)->get();
        foreach( $data as $row) {
            $row->delete();
        }
    }

    public function indexScholarship() {
        $this->panel = "Scholarship";
        $this->base_route = 'dcms.data.scholarship';
        $this->view_path ='dcms.data.scholarship';
        $this->tracker;
        $this->model = new ScholarshipData;
        $data['rows'] = $this->model::all();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    public function createScholarship() {
        $this->panel = "Scholarship";
        $this->base_route = 'dcms.data.scholarship';
        $this->view_path ='dcms.data.scholarship';
        $data['fiscal_year'] = array('70/71', '71/72', '72/73', '73/74', '74/75', '75/76');
        $data['continent'] = array('Asia', 'Europe', 'North America', 'Australia', 'South America', 'Africa');
        return view(parent::loadView($this->view_path.'.create'), compact('data'));
    }

    public function storeScholarship(Request $request)
    {
        $this->panel = "Scholarship";
        $this->base_route = 'dcms.data.scholarship';
        $this->view_path ='dcms.data.scholarship';
        $this->model = new ScholarshipData;
        $request->validate([
            'fiscal_year' => 'required',
            'continent' => 'required',
            'country' => 'required|max:225',
            'total_student' => 'required',
            'girls_no' => 'required',
            'boys_no' => 'required',
            'status' => 'required|boolean',
        ]);
        if($this->model->storeData($request->fiscal_year, $request->continent, $request->country, $request->total_student, $request->girls_no, $request->boys_no, $request->status) ){
            session()->flash('alert-success', $this->panel.' Successfully Store');
        }else {
            session()->flash('alert-danger', $this->panel.' can not be Store');
        }
        return redirect()->route($this->base_route.'.index');
    }

    public function editScholarship($id) {
        $this->panel = "Scholarship";
        $this->base_route = 'dcms.data.scholarship';
        $this->view_path ='dcms.data.scholarship';
        $data['fiscal_year'] = array('70/71', '71/72', '72/73', '73/74', '74/75', '75/76');
        $data['continent'] = array('Asia', 'Europe', 'North America', 'Australia', 'South America', 'Africa');
        $row = ScholarshipData::findOrFail($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('row', 'data'));
    }

    public function updateScholarship(Request $request, $id)
    {
        $this->panel = "Scholarship";
        $this->base_route = 'dcms.data.scholarship';
        $this->view_path ='dcms.data.scholarship';
        $this->model = new ScholarshipData;
        $request->validate([
            'fiscal_year' => 'required',
            'continent' => 'required',
            'country' => 'required|max:225',
            'total_student' => 'required',
            'girls_no' => 'required',
            'boys_no' => 'required',
            'status' => 'required|boolean',
        ]);
        if($this->model->updateData($id, $request->fiscal_year, $request->continent, $request->country, $request->total_student, $request->girls_no, $request->boys_no, $request->status) ){
            session()->flash('alert-success', $this->panel.' Successfully Updated');
        }else {
            session()->flash('alert-danger', $this->panel.' can not be Updated');
        }
        return redirect()->route($this->base_route.'.index');
    }

    public function destroyScholarship($id) {
        $this->panel = "Scholarship";
        $this->base_route = 'dcms.data.scholarship';
        $this->view_path ='dcms.data.scholarship';
        $this->tracker;
        $data = ScholarshipData::destroy($id);

    }

    public function indexNational() {
        $this->panel = "National";
        $this->base_route = 'dcms.data.national';
        $this->view_path ='dcms.data.national';
        $this->tracker;
        $this->model = new SchoolsData;
        $data['rows'] = $this->model::all();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    public function createNational() {
        // $this->panel = "Scholarship";
        // $this->base_route = 'dcms.data.scholarship';
        // $this->view_path ='dcms.data.scholarship';
        // $data['fiscal_year'] = array('70/71', '71/72', '72/73', '73/74', '74/75', '75/76');
        // $data['continent'] = array('Asia', 'Europe', 'North America', 'Australia', 'South America', 'Africa');
        // $row = ScholarshipData::findOrFail($id);
        // return view(parent::loadView($this->view_path.'.edit'), compact('row', 'data'));
    }

    public function storeNational(Request $request)
    {
        // $request->validate([
        //     'rows.*.title' => 'required|max:225',
        //     'icon' => 'required',
        //     'data' => 'required',
        //     'status' => 'required|boolean',
        //     'order' => 'numeric|nullable'
        // ], [
        //     'rows.*.name.required' => 'You have to enter the name of Link.',
        // ]);
        // if($this->model->storeData($request->rows, $request->status, $request->order, $request->icon, $request->data ) ){
        //     session()->flash('alert-success', $this->panel.' Successfully Store');
        // }else {
        //     session()->flash('alert-danger', $this->panel.' can not be Store');
        // }
        // return redirect()->route($this->base_route.'.index');
    }

    public function editNational($id) {
        $this->panel = "National";
        $this->base_route = 'dcms.data.national';
        $this->view_path ='dcms.data.national';
        $row = SchoolsData::findOrFail($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('row'));

    }

    public function updateNational(Request $request, $id)
    {
        $this->panel = "National";
        $this->base_route = 'dcms.data.national';
        $this->view_path ='dcms.data.national';
        $this->model = new SchoolsData;
        $request->validate([
            'state' => 'required|max:225',
            'school_no' => 'required',
            'total_student' => 'required',
            'girls_no' => 'required',
            'boys_no' => 'required',
        ]);
        if($this->model->updateData($id, $request->state, $request->school_no, $request->total_student, $request->girls_no, $request->boys_no ) ){
            session()->flash('alert-success', $this->panel.' Successfully Store');
        }else {
            session()->flash('alert-danger', $this->panel.' can not be Store');
        }
        return redirect()->route($this->base_route.'.index');
    }

    public function deleteNational() {
        // $this->panel = "National";

    }
}
