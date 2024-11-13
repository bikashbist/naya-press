<?php

namespace App\Http\Controllers\Dcms;

use App\Model\Dcms\Admission;
use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Eloquent\DM_Post;

class AdmissionController extends DM_BaseController
{
    protected $panel = 'Admission Procedure';
    protected $base_route = 'dcms.admission';
    protected $view_path = 'dcms.admission';
    protected $model;

    public function __construct(Admission $admission, DM_Post $dm_post) {
        $this->middleware('auth');
        $this->middleware('permission:admission-list', ['only' => ['index']]);
        $this->middleware('permission:admission-create', ['only' => ['create','store']]);
        $this->middleware('permission:admission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admission-delete', ['only' => ['destroy']]);
        $this->middleware('permission:admission-sort-order', ['only' => ['storeOrder']]);
        $this->model = new $admission;
        $this->lang_id = $dm_post::setLanguage();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $row = $this->model::findOrFail($id);
        return view(parent::loadView($this->view_path.'.show'), compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model::destroy($id);
    }
}
