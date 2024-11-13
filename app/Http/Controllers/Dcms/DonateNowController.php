<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\DonateNow;
use App\Model\Dcms\Eloquent\DM_Post;

class DonateNowController extends DM_BaseController
{
    protected $panel = 'Donate Now';
    protected $base_route = 'dcms.donate_now';
    protected $view_path = 'dcms.donate_now';
    protected $model;

    public function __construct(DonateNow $donate_now, DM_Post $dm_post) {
        $this->middleware('auth');
        $this->middleware('permission:donate_now-list', ['only' => ['index']]);
        $this->middleware('permission:donate_now-create', ['only' => ['create','store']]);
        $this->middleware('permission:donate_now-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:donate_now-delete', ['only' => ['destroy']]);
        $this->middleware('permission:donate_now-sort-order', ['only' => ['storeOrder']]);
        $this->model = new $donate_now;
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
