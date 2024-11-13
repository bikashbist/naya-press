<?php

namespace App\Http\Controllers\Dcms;

use App\Model\Dcms\OtherMenus;
use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Tag;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Post;
use App\Model\Dcms\Branch;
use DB;
use Response;

class OtherMenusController extends DM_BaseController
{
    protected $panel = 'Other Menus';
    protected $base_route = 'dcms.other_menus';
    protected $view_path = 'dcms.other_menus';
    protected $model;
    protected $table;
    protected $post;


    public function __construct(Request $request, OtherMenus $other_menus, DM_Post $dm_post, Tracker $tracker) {
        $this->middleware('auth');
        $this->middleware('permission:other_menus-list', ['only' => ['index']]);
        $this->middleware('permission:other_menus-create', ['only' => ['create','store']]);
        $this->middleware('permission:other_menus-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:other_menus-delete', ['only' => ['destroy']]);
        $this->middleware('permission:other_menus-sort-order', ['only' => ['storeOrder']]);
        $this->model = $other_menus;
        $this->dm_post = $dm_post;
        $this->lang_id = $dm_post::setLanguage();
        $this->tracker = $tracker::hit();
        // $menu_data = $menu::DTree();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->tracker;
        $items = $this->model->otherTree();
        $other = $this->model->getHtml($items);
        return view(parent::loadView($this->view_path.'.index'), compact('other'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->tracker;
        $data['parent_other'] = $this->dm_post::getOther();
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
            'url'   => 'nullable|url',
            'name' => 'required|max:225',
            'status' => 'required|boolean',
        ]);
        $this->tracker;
        $row = $this->model;
        $row->name = $request->name;
        $row->url = $request->link;
        $row->status = $request->status;
        $row->save();
        session()->flash('alert-success', $this->panel.' Successfully Added');
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
        $data['parent_other'] = $this->dm_post::getOther();
        $data['others'] = $this->model::findOrFail($id);
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
            'url'   => 'nullable|url',
            'name' => 'required|max:225',
            'status' => 'required|boolean',
        ]);
        $this->tracker;
        $row = $this->model::findOrFail($id);
        $row->name = $request->name;
        $row->url = $request->link;
        $row->status = $request->status;
        $row->save();
        session()->flash('alert-success', $this->panel.' Successfully Added');
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

    /** Store the order from ajax */
    public function storeOrder(Request $request){
        if($request->ajax()) {
            $data = json_decode($_POST['data']);
            $readbleArray = parent::parseJsonArray($data);
            $i = 0;
            foreach( $readbleArray as $row) {
                $i++;
                $others = OtherMenus::findOrFail($row['id']);
                $others->parent_id = $row['parentID'];
                $others->order = $i;
               $others->save();
            }
            return var_dump(Response::json($readbleArray));
        }
    }

}
