<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\AffiliatedStaff;
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

class AffiliatedStaffController extends DM_BaseController
{
    protected $panel = 'Campus Staff';
    protected $base_route = 'dcms.institute.staff';
    protected $view_path = 'dcms.institute.staff';
    protected $model;
    protected $table;

    public function __construct(Request $request, AffiliatedStaff $model, AffiliatedPage $model_2, Tracker $tracker,DM_Post $dm_post) {
        $this->middleware('auth');
        // $this->middleware('permission:staff-list', ['only' => ['index']]);
        // $this->middleware('permission:staff-create', ['only' => ['create','store']]);
        // $this->middleware('permission:staff-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:staff-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:staff-sort-order', ['only' => ['storeOrder']]);
        $this->model = $model;
        $this->tracker = $tracker::hit();
        $this->dm_post = $dm_post;
        $this->model_2 = $model_2;
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
        $data['lang'] = $this->dm_post::getLanguage();
        $data['institute'] = $this->model_2::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->get();
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
            'rows.*.name' => 'required|max:225',
            'image' => 'image',
            'status' => 'required|boolean' ,
            'affiliated_id'=> 'required',
        ], [
            'rows.*.name.required' => 'The Staff Name is required (Language)',
            'affiliated_id.required' => 'Select Institute',
        ]);
        if($this->model->storeData($request, $request->rows, $request->image, $request->affiliated_id, $request->status, $request->featured, $request->level, $request->phone, $request->email, $request->type) ){
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
    public function edit($unique_id)
    {
        $staff = $this->model::where('unique_id', '=', $unique_id)->get();
        $data['lang'] = $this->dm_post::getLanguage();
        $data['institute'] = $this->model_2::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->get();
        $data['single'] = $this->model::where('unique_id', '=', $unique_id)->first();
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'staff'));
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
            'rows.*.name' => 'required|max:225',
            'image' => 'image',
            'status' => 'required|boolean' ,
            'affiliated_id'=> 'required',
        ], [
            'rows.*.name.required' => 'The Staff Name is required (Language)',
            'affiliated_id.required' => 'Select Institute',
        ]);
        if($this->model->updateData($request, $request->unique_id, $request->rows, $request->image, $request->affiliated_id, $request->status,$request->featured, $request->level, $request->phone, $request->email,$request->type ) ){
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
    public function destroy($unique_id)
    {
        $this->tracker;
        $data = $this->model::where('unique_id', '=', $unique_id)->get();
        foreach( $data as $row) {
            $row->delete();
        }
    }

    public function getSortList() {
        $this->tracker;
        $data['branch'] = $this->branch::where('status', '=', 1)->get();
        return view(parent::loadView($this->view_path.'.sort'), compact('data'));
    }

    public function getStaffs($id) {
        $this->tracker;
        $data = $this->model::where('lang_id', '=', $this->lang_id)->where('branch_id', '=', $id)->orderBy('order')->get();

        // return Response::json($data);
        return json_decode($data);
    }

    public function storeOrder(Request $request){
        if($request->ajax()) {
            $data = json_decode($_POST['data']);
            $readbleArray = parent::uniqueParseJsonArray($data);
            $i = 0;
            foreach( $readbleArray as $row) {
                $i++;
                $menu = Staff::where('unique_id', '=', $row['unique'])->get();
                foreach($menu as $stf) {
                    $staff = Staff::findOrFail($stf->id);
                    $staff->order = $i;
                    $staff->save();
                }
            }
            return var_dump(Response::json($readbleArray));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStaff()
    {
        $this->base_route = 'dcms.faculty.staff';
        $this->view_path = 'dcms.faculty.staff';
        $this->tracker;
        $data['rows'] = $this->model::where('lang_id', '=', $this->lang_id)->where('type', '=', 'faculty')->get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStaff()
    {
        $this->base_route = 'dcms.faculty.staff';
        $this->view_path = 'dcms.faculty.staff';
        $data['lang'] = $this->dm_post::getLanguage();
        $data['institute'] = $this->model_2::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->where('type', '=', 'faculty')->get();
        return view(parent::loadView($this->view_path.'.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStaff(Request $request)
    {
        $this->base_route = 'dcms.faculty.staff';
        $this->view_path = 'dcms.faculty.staff';
        $request->validate([
            'rows.*.name' => 'required|max:225',
            'image' => 'image',
            'status' => 'required|boolean' ,
            'affiliated_id'=> 'required',
        ], [
            'rows.*.name.required' => 'The Staff Name is required (Language)',
            'affiliated_id.required' => 'Select Faculty',
        ]);
        if($this->model->storeData($request, $request->rows, $request->image, $request->affiliated_id, $request->status, $request->featured, $request->level, $request->phone, $request->email, $request->type) ){
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
    public function showStaff($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editStaff($unique_id)
    {
        $this->base_route = 'dcms.faculty.staff';
        $this->view_path = 'dcms.faculty.staff';
        $staff = $this->model::where('unique_id', '=', $unique_id)->get();
        $data['lang'] = $this->dm_post::getLanguage();
        $data['institute'] = $this->model_2::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->where('type', '=', 'faculty')->get();
        $data['single'] = $this->model::where('unique_id', '=', $unique_id)->first();
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStaff(Request $request, $id)
    {
        $this->base_route = 'dcms.faculty.staff';
        $this->view_path = 'dcms.faculty.staff';
        $request->validate([
            'rows.*.name' => 'required|max:225',
            'image' => 'image',
            'status' => 'required|boolean' ,
            'affiliated_id'=> 'required',
        ], [
            'rows.*.name.required' => 'The Staff Name is required (Language)',
            'affiliated_id.required' => 'Select Faculty',
        ]);
        if($this->model->updateData($request, $request->unique_id, $request->rows, $request->image, $request->affiliated_id, $request->status,$request->featured, $request->level, $request->phone, $request->email,$request->type ) ){
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
    public function destroyStaff($unique_id)
    {
        $this->base_route = 'dcms.faculty.staff';
        $this->view_path = 'dcms.faculty.staff';
        $this->tracker;
        $data = $this->model::where('unique_id', '=', $unique_id)->get();
        foreach( $data as $row) {
            $row->delete();
        }
    }
}
