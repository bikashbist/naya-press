<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Category;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;
use Illuminate\Support\Str;
use Response;
use DB;

class CategoriesController extends DM_BaseController
{
    protected $panel = 'Category';
    protected $base_route = 'dcms.category';
    protected $view_path = 'dcms.category';
    protected $model;
    protected $table;

    public function __construct(Category $category, Tracker $tracker, DM_Post $dm_post) {
        $this->middleware('auth');
        $this->middleware('permission:category-list', ['only' => ['index']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        $this->middleware('permission:category-sort-order', ['only' => ['storeOrder']]);
        $this->model = $category;
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
        $this->tracker;
        $items = $this->model->categoryTree($this->lang_id);
        $category = $this->model->getHtml($items);
        $data['lang']= $this->dm_post::getLanguage();
        return view(parent::loadView($this->view_path.'.index'), compact('category','data'));
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
            'rows.*.lang_name' => 'required|max:225',
        ]);
        $this->tracker;
        $row = $this->model;
        $row->name = $request->name;
        $row->slug = Str::slug($request->name);
        $row->save();
        $category_id = $row->id;
        foreach($request->rows as $row) {
            DB::table('categories_name')->insert(array([
                'category_id' => $category_id,
                'lang_id' => $row['lang_id'],
                'name' => $row['lang_name'],
            ]));
        }
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
        $data['rows'] = $this->model::all();
        $data['lang']= $this->dm_post::getLanguage();
        $row = $this->model::findOrFail($id);
        $categories_name = DB::table('categories_name')->where('category_id', '=', $id)->get();
        return view(parent::loadView($this->view_path.'.edit'), compact('row', 'data','categories_name'));
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
            'rows.*.lang_name' => 'required|max:225',
        ]);
        $this->tracker;
        $row = $this->model::findOrFail($id);
        $row->name = $request->name;
        $row->slug = Str::slug($request->name);
        $row->save();
        $category_id = $row->id;
        foreach($request->rows as $row) {
            $category_name =  DB::table('categories_name')->where('category_id', $id)->where('lang_id', $row['lang_id'])->first();
            if(isset($category_name)){
                DB::table('categories_name')->where('category_id', $id)->where('lang_id', $row['lang_id'])->update([
                    'category_id' => $id,
                    'lang_id' => $row['lang_id'],
                    'name' => $row['lang_name'],
                ]);
            }else {
                DB::table('categories_name')->where('category_id', $id)->where('lang_id', $row['lang_id'])->insert([
                    'category_id' => $id,
                    'lang_id' => $row['lang_id'],
                    'name' => $row['lang_name'],
                ]);
            }
        }
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
                $category = Category::findOrFail($row['id']);
                $category->order = $i;
                $category->parent_id = $row['parentID'];
               $category->save();
            }
            // return var_dump(Response::json($category));
        }
    }

}
