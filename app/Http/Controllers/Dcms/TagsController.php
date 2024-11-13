<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Tag;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Post;
use App\Model\Dcms\Branch;
use DB;
use Response;

class TagsController extends DM_BaseController
{
    protected $panel = 'Tag';
    protected $base_route = 'dcms.tag';
    protected $view_path = 'dcms.tag';
    protected $model;
    protected $table;
    protected $post;


    public function __construct(Request $request, Tag $tag, DM_Post $dm_post, Tracker $tracker) {
        $this->middleware('auth');
        $this->middleware('permission:tag-list', ['only' => ['index']]);
        $this->middleware('permission:tag-create', ['only' => ['create','store']]);
        $this->middleware('permission:tag-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:tag-delete', ['only' => ['destroy']]);
        $this->middleware('permission:tag-sort-order', ['only' => ['storeOrder']]);
        $this->model = $tag;
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
        $items = $this->model->tagTree();
        $tag = $this->model->getHtml($items);
        return view(parent::loadView($this->view_path.'.index'), compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->tracker;
        $data['parent_tag'] = $this->dm_post::getTag();
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
        $data['parent_tag'] = $this->dm_post::getTag();
        $data['tags'] = $this->model::findOrFail($id);
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
                $tag = Tag::findOrFail($row['id']);
                $tag->parent_id = $row['parentID'];
                $tag->order = $i;
               $tag->save();
            }
            return var_dump(Response::json($readbleArray));
        }
    }

}
