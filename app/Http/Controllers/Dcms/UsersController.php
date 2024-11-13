<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\User;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Role;

class UsersController extends DM_BaseController
{
    protected $panel = 'Users';
    protected $base_route = 'dcms.user';
    protected $view_path ='dcms.user';
    protected $model;
    protected $table;

    /**
     * Constructor
     */
    public function __construct(User $user, Tracker $tracker, DM_Post $dm_post, Role $role) {
        $this->middleware('auth');
        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->model = $user;
        $this->role = $role;
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
        
        $this->tracker;
        return view(parent::loadView($this->view_path.'.create'));
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
        $roles = $this->role::where('status', '=', 1)->get();
        return view(parent::loadView($this->view_path.'.edit'), compact('row', 'roles'));
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
        $row = $this->model::findOrFail($id);
        $row->name = $request->name;
        $row->role_super = $request->role_super;
        $row->role_id = $request->role;
        $row->status = $request->status;
        if($row->save()) {
            session()->flash('alert-success', $this->panel.' Successfully updated');
        }else{
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
    public function destroy($id)
    {   
        $this->tracker;
        $this->model::destroy($id);
    }
}
