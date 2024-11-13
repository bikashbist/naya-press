<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\AffiliatedProgramCategory;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;
use Illuminate\Support\Str;
use Response;

class AffiliatedProgramCategoryController extends DM_BaseController
{
    protected $panel = 'Program Category';
    protected $base_route = 'dcms.institute.category';
    protected $view_path = 'dcms.institute.category';
    protected $model;
    protected $table;
    
    public function __construct(AffiliatedProgramCategory $model, Tracker $tracker, DM_Post $dm_post) {
        $this->middleware('auth');
        // $this->middleware('permission:category-list', ['only' => ['index']]);
        // $this->middleware('permission:category-create', ['only' => ['create','store']]);
        // $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:category-sort-order', ['only' => ['storeOrder']]);
        $this->model = $model;
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
        $items = $this->model->categoryTree();
        $category = $this->model->getHtml($items);
        return view(parent::loadView($this->view_path.'.index'), compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view(parent::loadView($this->view_path.'.create'));
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
            'name' => 'required|max:225',
        ]);
        $this->tracker;
        $row = $this->model;
        $row->name = $request->name;
        $row->slug = Str::slug($request->name);
        $row->save();
        if($row->save()){
            session()->flash('alert-success', $this->panel.' Successfully Added');
        }
        else{
            session()->flash('alert-success', $this->panel.' Can not be Added');
        }
        return back();
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
        $data['rows'] = $this->model::all();
        $row = $this->model::findOrFail($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('row', 'data'));
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
            'name' => 'required|max:225',
        ]);
        $this->tracker;
        $row = $this->model::findOrFail($id);
        $row->name = $request->name;
        $row->slug = Str::slug($request->name);
        $row->save();
        if($row->save()){
            session()->flash('alert-success', $this->panel.' Successfully Updated');
        }
        else{
            session()->flash('alert-danger', $this->panel.' Can not be Updated');
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

    /** Store the order from ajax */
    public function storeOrder(Request $request){
        if($request->ajax()) {
            $data = json_decode($_POST['data']);
            $readbleArray = parent::parseJsonArray($data);
            $i = 0;
            foreach( $readbleArray as $row) {
                $i++;
                $category = $this->model::findOrFail($row['id']);
                $category->parent_id = $row['parentID'];
               $category->save();
            }
            // return var_dump(Response::json($category));
        }
    }
}
