<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Branch;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;

class BranchesController extends DM_BaseController
{
    protected $panel = 'Office Branch';
    protected $base_route = 'dcms.branch';
    protected $view_path = 'dcms.branch';
    protected $model;
    protected $table;
    
    public function __construct(Request $request, Branch $branch, Tracker $tracker,DM_Post $dm_post) {
        $this->middleware('auth');
        $this->middleware('permission:branch-list', ['only' => ['index']]);
        $this->middleware('permission:branch-create', ['only' => ['create','store']]);
        $this->middleware('permission:branch-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:branch-delete', ['only' => ['destroy']]);
        $this->middleware('permission:branch-sort-order', ['only' => ['storeOrder']]);
        $this->model = $branch;
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
        $items = $this->model->branchTree();
        $branch = $this->model->getHtml($items);
        return view(parent::loadView($this->view_path.'.index'), compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['lang'] = $this->dm_post::getLanguage();
        $data['parent_branch'] = $this->model::where('status', '=', 1)->get();
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
            'name' => 'required|max:225',
            'rows.*.name' => 'required|max:225',
            'status' => 'required|boolean',
            'order' => 'nullable',
        ], [
            'rows.*.name.required' => 'You have to enter the name of Branch Office ( Language )',
        ]);
        if($this->model::storeData($request->name, $request->rows, $request->status)){
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
        $data['row'] = $this->model::findOrFail($id);
        $data['lang'] = $this->dm_post::getLanguage();
        $branches = DB::table('branches_name')->where('branch_id', $id)->get();
        // dd($branches);
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'branches')); 
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
            'status' => 'required|boolean',
            'order' => 'nullable',
        ], [
            'rows.*.name.required' => 'You have to enter the name of Branch Office( Language )',
        ]);
        if($this->model::updateData($id, $request->name, $request->rows , $request->status)){
            session()->flash('alert-success', $this->panel.' Successfully Updated');
        }else {
            session()->flash('alert-danger', $this->panel.' can not be Updated');
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
                $branch = Branch::findOrFail($row['id']);
                $branch->parent_id = $row['parentID'];
                $branch->order = $i;
               $branch->save();
            }
            // return var_dump(Response::json($category));
        }
    }
}
