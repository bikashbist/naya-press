<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Permission;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;
use Illuminate\Support\Facades\Validator;
use Session; 


class PermissionController extends DM_BaseController
{
    protected $panel = 'Permission';
    protected $base_route = 'dcms.permission';
    protected $view_path ='dcms.permission';
    protected $model;
    protected $table;

    public function __construct(Request $request, permission $model, Tracker $tracker, DM_Post $dm_post) {
        $this->middleware('auth');
        $this->model = $model;
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
        // $this->tracker;
        // $items = $this->model->permissionTree();
        // $data = $this->model->getHtml($items);
        // return view(parent::loadView($this->view_path.'.index'), compact('data'));
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
        //
    }
}
