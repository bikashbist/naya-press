<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Language;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;
use App\DM_libraries\DM_get_langs_in_array;

class LanguageController extends DM_BaseController
{
    protected $panel = 'Language';
    protected $base_route = 'dcms.language';
    protected $view_path ='dcms.language';
    protected $model;
    protected $table;

    public function __construct(Tracker $tracker, DM_Post $dm_post) {
        $this->middleware('auth');
        $this->middleware('permission:language-list', ['only' => ['index']]);
        $this->middleware('permission:language-create', ['only' => ['create','store']]);
        $this->middleware('permission:language-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:language-delete', ['only' => ['destroy']]);
        $this->model = new Language();
        $this->table = DB::table('languages');
        $this->tracker = $tracker::hit();
        $this->lang_id = $dm_post::setLanguage();

    }

    public function index(){
        $this->tracker;
        $data['rows'] = $this->model::where('deleted_at', '=', NULL)->get();//for all data except softDelete
        return view(parent::loadView($this->view_path.'.index'), compact('data'));

    }

    public function create(){
        $this->tracker;
        return view(parent::loadView($this->view_path.'.create'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:225|unique:languages',
            'code' => 'required|max:2|unique:languages',
            'status' => 'required|boolean',
            'image' => 'image',
        ]);
        $this->tracker;
        if($this->model->storeData($request, $request['name'],$request['code'],$request['order'],$request['status'],$request['default'],'image')){
            // $dir = resource_path().'/lang'.'/'.$request['code'].'/';
            // $file = $dir.$request['code'].'_lang.php';
            
            $json_dir = resource_path().'/lang'.'/';
            $json_file = $json_dir.$request['code'].'.json';
            if(!file_exists($json_dir)){
                mkdir($dir);
            }
            if(!file_exists($json_file)) {
                $myFile = fopen($json_file, "w") or die("Unable to open file!");
                $txt = "{\n\n}";
                fwrite($myFile, $txt);
                fclose($myFile);
            }
            // if(!file_exists($file)){
            //     $myFile = fopen($file, "w") or die("Unable to open file!");
            //     $txt = "<?php\nreturn[\n\n];";
            //     fwrite($myFile, $txt);
            //     fclose($myFile);
            // }
            // $file = $dir.'dcms_lang.php';
            // if(!file_exists($file)){
            //     $myFile = fopen($file, "w") or die("Unable to open file!");
            //     $txt = "<?php\nreturn[\n\n];";
            //     fwrite($myFile, $txt);
            //     fclose($myFile);
            // }
            session()->flash('alert-success', $this->panel.' Successfully Added');
        }
        else{
            session()->flash('alert-danger', $this->panel.' can not be added');
        }
        return redirect()->route($this->base_route.'.index');
    }

    public function edit($id){
        $this->tracker;
        $row = $this->model::findOrFail($id);
        return view(parent::loadView($this->view_path.'.edit'), compact('row'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:225',
            'code' => 'required|max:2',
            'status' => 'required|boolean',
            'image' => 'image',
        ]);
        $this->tracker;
        if($this->model->updateData($request,$id,$request['name'],$request['code'],$request['order'],$request['status'],$request['default'],'image')){
            session()->flash('alert-success', $this->panel.' Successfully Updated.');
        }
        else{
            session()->flash('alert-danger', $this->panel.' can not be Updated');
        }
        return redirect()->route($this->base_route.'.index');
    }

    public function destroy($id){
        $this->tracker;
        $row = $this->model::findOrFail($id);
        $file_path = getcwd(). $row->image;
        if(is_file($file_path)){
            unlink($file_path);
        }
        $this->model::destroy($id);
    }

    public function deletedLanguage() {
        $this->tracker;
        $data['rows'] = $this->model::where('deleted_at', '!=', null)->get();
        return view(parent::loadView($this->view_path.'.deleted'), compact('data'));

    }

    public function restore($id) {
        $this->tracker;
        $row = $this->model::findOrFail($id);
        $row->deleted_at = null;
        $row->save();
    }

    public function permanentDelete($id) {
        $this->tracker;
        $data = $this->model::where('id', '=', $id)->delete();
    }

}




