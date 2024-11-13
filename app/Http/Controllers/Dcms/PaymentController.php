<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Payment;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;

class PaymentController extends DM_BaseController
{
    protected $model;
    protected $view_path = 'dcms.payment';
    protected $base_route = 'dcms.payment';
    protected $panel = 'Payment';
    protected $folder = 'payment';

    public function __construct(Payment $payment, DM_Post $dm_post, Tracker $tracker) {
        $this->middleware('auth');
        $this->middleware('permission:payment-list', ['only' => ['index']]);
        $this->middleware('permission:payment-create',['only' => ['create','store']]);
        $this->middleware('permission:payment-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:payment-delete', ['only' => ['destroy']]);
        $this->model = $payment;
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
        return view(Parent::loadView($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->tracker;
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
       // dd($request->all());
        $request->validate([
            'eswa' => 'mimes:jpeg,jpg,png,gif|max:50000',
            'khalti' => 'mimes:jpeg,jpg,png,gif|max:50000',
            'bank' => 'mimes:jpeg,jpg,png,gif|max:50000',
        ]);
        $this->tracker;
        if($this->model->storeData($request, $request->eswa, $request->khalti, $request->bank)){
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
    public function edit($id)
    {
        $this->tracker;
        $data['lang'] = $this->dm_post::getLanguage();
        $data['payment'] = $this->model::findOrFail($id);
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
        $request->validate([
            'eswa' => 'mimes:jpeg,jpg,png,gif|max:50000',
            'khalti' => 'mimes:jpeg,jpg,png,gif|max:50000',
            'bank' => 'mimes:jpeg,jpg,png,gif|max:50000',
        ]);
        $this->tracker;
        if($this->model->updateData($request, $id, $request->eswa, $request->khalti, $request->bank)){
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
    public function destroy($id)
    {
        $this->tracker;
        $row = $this->model::findOrFail($id);
        $file_path = getcwd(). $row->eswa;
        if(is_file($file_path)){
            unlink($file_path);
        }
        $file_path = getcwd(). $row->bank;
        if(is_file($file_path)){
            unlink($file_path);
        }
        $file_path = getcwd(). $row->khalti;
        if(is_file($file_path)){
            unlink($file_path);
        }
        $this->model::destroy($id);
        
    }
}
