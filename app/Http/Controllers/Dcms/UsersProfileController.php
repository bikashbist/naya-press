<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\User;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\Tracker;
use Auth;
use Illuminate\Support\Facades\Hash;

class UsersProfileController extends DM_BaseController
{
    protected $panel = 'Profile';
    protected $base_route = 'dcms.user_profile';
    protected $view_path ='dcms.user_profile';
    protected $model;
    protected $table;
    protected $folder = 'profile';
    protected $folder_path;
    protected $image_prefix_path = '/upload_file/images/profile/';

    /**
     * Constructor
     */
    public function __construct(User $user, Tracker $tracker, DM_Post $dm_post) {
        $this->middleware('auth');
        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->model = $user;
        $this->model = $user;
        $this->tracker = $tracker::hit();
        $this->lang_id = $dm_post::setLanguage();
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show()
    {
        $row = $this->model::findOrFail(Auth::user()->id);
        return view(parent::loadView($this->view_path.'.show'), compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $row = $this->model::findOrFail(Auth::user()->id);
        return view(parent::loadView($this->view_path.'.edit'), compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $row = $this->model::findOrFail(Auth::user()->id);
        $row->name = $request->name;
        $row->email = $request->email;
        $row->phone = $request->phone;
        $file_path = getcwd(). $row->avatar;
        if(is_file($file_path)){
            unlink($file_path);
        }
        if($request->hasFile('avatar')){
            $row->avatar = parent::uploadImage($request,$this->folder_path,$this->image_prefix_path,'avatar','500','500');
        }
        $row->save();
        session()->flash('alert-success', $this->panel. ' successfully edited.');
        return redirect()->route($this->base_route.'.show');
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

    /**'
     * changed password for individual user 
     */
    public function changePassword(Request $request) {
        if(Hash::check($request->current_password, Auth::user()->password) ){
            $row = $this->model::findOrFail(Auth::user()->id);
            $row->password = Hash::make($request->password);
            $row->save();
            session()->flash('alert-success', 'Password changed successfully.');
            Auth::logout();
            return redirect()->route('dcms.login');
        }
        else{
            session()->flash('alert-warning', 'Password did not match.');
            return redirect()->back();
        }
    }
}
