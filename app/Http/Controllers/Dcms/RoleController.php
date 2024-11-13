<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Role;
use App\Model\Dcms\Permission;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;
use Illuminate\Support\Facades\Validator;
use Session; 

class RoleController extends DM_BaseController
{
    protected $panel = 'Role';
    protected $base_route = 'dcms.role';
    protected $view_path ='dcms.role';
    protected $model;
    protected $table;

    public function __construct(Request $request,Role $model, Tracker $tracker, DM_Post $dm_post, Permission $permission) {
        $this->middleware('auth');
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        $this->middleware('permission:assign-permission', ['only' => ['destroy']]);
        $this->model = $model;
        $this->tracker = $tracker::hit();
        $this->dm_post = $dm_post;
        $this->lang_id = $dm_post::setLanguage();
        $this->permission = $permission;
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
        $request->validate([
           
        ]);
        if($this->model->storeData($request->name, $request->status) ){
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
    public function edit($id)
    {
        $this->tracker;
        $data['row'] = $this->model::findOrFail($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('data'));
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
        if($this->model->updateData($id, $request->name, $request->status)){
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
    public function destroy($id)
    {
        $this->tracker;
        $this->model::destroy($id);
    }

    public function assignPermission($id) {
        $data['row'] = $this->model::findOrFail($id);
        $data['permission'] = $this->permission::all();
        $data['assign_permission'] = $this->joinRolePermission($id);
        $data['permission_id'] = [];
        foreach($data['assign_permission'] as $row){
            array_push($data['permission_id'], $row->permission_id);
        }
        $data['p_id'] = array_combine($data['permission_id'], $data['permission_id']);
        return view(parent::loadView($this->view_path.'.permission'), compact('data'));
    }

    public function updateAssignPermission(Request $request, $id) {
        if(DB::table('permission_role')->where('role_id', $id)->first()){
            DB::table('permission_role')->where('role_id', $id)->delete();
        }
        $permission = $request->permission;
        if(isset($permission)){
            foreach($permission as $row) {
                $data[] = [
                    'permission_id' => $row,
                    'role_id' => $id,
                ];
            }
        DB::table('permission_role')->insert($data);
        }

        $data['rows'] = $this->model::all();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));

    }

    public function joinRolePermission($id) {
        $permission_role = DB::table('permission_role')
        ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
        ->where('permission_role.role_id', '=', $id)
        ->select('permission_role.*', 'permissions.name', 'permissions.slug')
        ->get();
        return $permission_role;
    }
}
