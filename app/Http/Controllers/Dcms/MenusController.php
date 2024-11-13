<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Menu;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Post;
use App\Model\Dcms\Branch;
use DB;
use Response;

class MenusController extends DM_BaseController
{
    protected $panel = 'Menus';
    protected $base_route = 'dcms.menu';
    protected $view_path = 'dcms.menu';
    protected $model;
    protected $table;
    protected $post;


    public function __construct(Request $request, Menu $menu, DM_Post $dm_post, Tracker $tracker) {
        $this->middleware('auth');
        $this->middleware('permission:menu-list', ['only' => ['index']]);
        $this->middleware('permission:menu-create', ['only' => ['create','store']]);
        $this->middleware('permission:menu-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:menu-delete', ['only' => ['destroy']]);
        $this->middleware('permission:menu-sort-order', ['only' => ['storeOrder']]);
        $this->model = $menu;
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
        $items = $this->model->menuTree();
        $menu = $this->model->getHtml($items);
        return view(parent::loadView($this->view_path.'.index'), compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->tracker;
        $data['type'] = array('Page', 'Post', 'Category', 'Branch', 'Custom Link');
        $data['target'] = array('_self', '_blank');
        $data['lang']= $this->dm_post::getLanguage();
        $data['posts'] = $this->dm_post::getAllPosts($this->lang_id);
        $data['pages'] = $this->dm_post::getAllPages($this->lang_id);
        $data['categories'] = $this->dm_post::getCategories();
        // $data['institute'] = $this->dm_post::getInstitute($this->lang_id);
        // $data['faculty'] = $this->dm_post::getFaculty($this->lang_id);
        $data['branch']  = $this->dm_post::getBranch($this->lang_id);
        $data['parent_menu'] = $this->dm_post::getMenu();
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
            'type' => 'required',
            'url'   => 'nullable|url',
            'name' => 'required|max:225',
            'rows.*.lang_name' => 'required|max:225',
            'target' => 'required',
            'status' => 'required|boolean',
        ], [
            'rows.*.lang_name.required' => 'Menu Name is required (Language)'
        ]);
        $this->tracker;
        $row = $this->model;
        $row->name = $request->name;
        $row->type = $request->type;

        if($row->type == "Page"){
            $row->url = "/page/$request->page_unique_id";
            $row->parameter = $request->page_unique_id;
        }
        elseif($row->type == "Post") {
            $row->url = "/post/$request->post_unique_id";
            $row->parameter = $request->post_unique_id;
        }
        elseif( $row->type == "Category") {
            $row->url = "/category/{$request->category_id}";
            $row->parameter = $request->category_id;
        }
        elseif( $row->type == "Institute Page") {
            $row->url = "/institute/{$request->institute_unique_id}";
            $row->parameter = $request->institute_unique_id;
        }
        elseif( $row->type == "Faculty Page") {
            $row->url = "/faculty/{$request->faculty_unique_id}";
            $row->parameter = $request->faculty_unique_id;
        }
        elseif( $row->type == "Branch") {
            $row->url = "/branch/{$request->branch_id}";
            $row->parameter = $request->branch_id;
        }
        else {
            $row->url = $request->link;
        }

        $row->target = $request->target;
        $row->status = $request->status;
        $row->save();
        $menu_id = $row->id;
        foreach($request->rows as $row) {
            DB::table('menus_name')->insert(array([
                'menu_id' => $menu_id,
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
        $data['type'] = array('Page', 'Post', 'Category', 'Custom Link', 'Branch');
        $data['target'] = array('_self', '_blank');
        $data['lang'] = $this->dm_post::getLanguage();
        $data['posts'] = $this->dm_post::getAllPosts($this->lang_id);
        $data['pages'] = $this->dm_post::getAllPages($this->lang_id);
        $data['categories'] = $this->dm_post::getCategories();
        
        $data['branch']  = $this->dm_post::getBranch();
        

        // $data['institute'] = $this->dm_post::getInstitute($this->lang_id);
        // $data['faculty'] = $this->dm_post::getFaculty($this->lang_id);
        // $data['branch'] = Branch::where('status', '=', 1)->orderBy('order')->get();

        $data['parent_menu'] = $this->dm_post::getMenu();
        $data['menus'] = $this->model::findOrFail($id);
        $menus_name = DB::table('menus_name')->where('menu_id', '=', $id)->get();
       
        $data['single_page'] = '';
        $data['single_post'] = '';
        $data['category'] = '';
        $data['single_institute'] = '';
        $data['single_faculties'] = '';
        $data['single_branch'] = '';
        
        if (isset($data['menus']->parameter) && $data['menus']->type == "Page") {
            $data['single_page'] = $this->dm_post::getSinglePage($data['menus']->parameter, $this->lang_id);
        } elseif (isset($data['menus']->parameter) && $data['menus']->type == "Post") {
            $data['single_post'] = $this->dm_post::getSinglePost($data['menus']->parameter, $this->lang_id);
        } elseif (isset($data['menus']->parameter)  && $data['menus']->type == "Category") {
            $data['single_category'] = $this->dm_post::getCategories($data['menus']->parameter, $this->lang_id);
        } elseif (isset($data['menus']->parameter)  && $data['menus']->type == "Institute Page") {
            $data['single_institute'] = $this->dm_post::getSingleInstitute($data['menus']->parameter, $this->lang_id);
        } elseif (isset($data['menus']->parameter)  && $data['menus']->type == "Faculty Page") {
            $data['single_faculty'] = $this->dm_post::getSingleFaculty($data['menus']->parameter, $this->lang_id);

        } elseif (isset($data['menus']->parameter)  && $data['menus']->type == "Branch") {
            
            $data['single_branch'] = $this->dm_post::getBranches($data['menus']->parameter);
            
        }
        
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'menus_name'));
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
            'type' => 'required',
            'url'   => 'nullable|url',
            'name' => 'required|max:225',
            'rows.*.lang_name' => 'required|max:225',
            'target' => 'required',
            'status' => 'required|boolean',
        ], [
            'rows.*.lang_name.required' => 'Menu Name is required (Language)'
        ]);
        $this->tracker;
        $row = $this->model::findOrFail($id);
        $row->name = $request->name;
        $row->type = $request->type;

        if ($row->type == "Page") {
            $row->url = "/page/$request->page_unique_id";
            $row->parameter = $request->page_unique_id;
        } elseif ($row->type == "Post") {
            $row->url = "/post/$request->post_unique_id";
            $row->parameter = $request->post_unique_id;
        } elseif ($row->type == "Category") {
            $row->url = "{$request->link}";
            $row->parameter = $request->link;
        } elseif ($row->type == "Institute Page") {
            $row->url = "/institute/{$request->institute_unique_id}";
            $row->parameter = $request->institute_unique_id;
        } elseif ($row->type == "Faculty Page") {
            $row->url = "/faculty/{$request->faculty_unique_id}";
            $row->parameter = $request->faculty_unique_id;
        } elseif ($row->type == "Branch") {
            $row->url = "{$request->link}";
            $row->parameter = $request->link;
        } else {
            $row->url = $request->link;
        }
        $row->target = $request->target;
        $row->status = $request->status;
        $row->save();
        $menu_id = $row->id;
        foreach ($request->rows as $row) {
            $menu_name =  DB::table('menus_name')->where('menu_id', $id)->where('lang_id', $row['lang_id'])->first();
            if (isset($menu_name)) {
                DB::table('menus_name')->where('menu_id', $id)->where('lang_id', $row['lang_id'])->update([
                    'menu_id' => $id,
                    'lang_id' => $row['lang_id'],
                    'name' => $row['lang_name'],
                ]);
            } else {
                DB::table('menus_name')->where('menu_id', $id)->where('lang_id', $row['lang_id'])->insert([
                    'menu_id' => $id,
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
                $menu = Menu::findOrFail($row['id']);
                $menu->parent_id = $row['parentID'];
                $menu->order = $i;
               $menu->save();
            }
            return var_dump(Response::json($readbleArray));
        }
    }

}
