<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\JournalContent;
use App\Model\Dcms\JournalFile;
use App\Model\Dcms\Eloquent\DM_Post;
use DB;
use Illuminate\Support\Str;
use Auth;
use DateTime;
use App\Model\Dcms\Tracker;
use Response;

class JournalContentController extends DM_BaseController
{
    protected $panel = 'Journal Content';
    protected $base_route = 'dcms.journal';
    protected $view_path = 'dcms.journal';
    protected $model;
    protected $table;

    public function __construct(Request $request, JournalContent $model, JournalFile $file, DM_Post $dm_post, Tracker $tracker) {
        $this->middleware('auth');
        // $this->middleware('permission:page-list', ['only' => ['indexPage']]);
        // $this->middleware('permission:page-create', ['only' => ['createPage','storePage']]);
        // $this->middleware('permission:page-edit', ['only' => ['editPage','updatePage']]);
        // $this->middleware('permission:page-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:delete-file', ['only' => ['destroyFile']]);
        // $this->middleware('permission:deleted-page', ['only' => ['deletedPage']]);
        // $this->middleware('permission:post-list', ['only' => ['indexPost']]);
        // $this->middleware('permission:post-create', ['only' => ['createPost','storePost']]);
        // $this->middleware('permission:post-edit', ['only' => ['editPost','updatePost']]);
        // $this->middleware('permission:page-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:deleted-post', ['only' => ['deletedPost']]);
        // $this->middleware('permission:delete-post-permanently', ['only' => ['permanentDelete']]);
        // $this->middleware('permission:restore-post', ['only' => ['restore']]);
        $this->model = $model;
        $this->file_model = $file;
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
        $data['rows'] = $this->model::where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->get();
        return view(parent::loadView($this->view_path.'.index'), compact('data'));
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
        $data['categories'] = $this->dm_post::getJournalCategories();
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
            'rows.*.title' => 'required|max:225',
            'rows.*.description' => 'required',
            'image' => 'image',
            'file_title' => 'array|max:225',
            // 'files' => 'array|mimes:pdf,docx,xlsx',
            // 'tag' => 'required|max:255',
            'status' => 'required|boolean' ,
            'category' => 'required'
        ], [
            'rows.*.title.required' => 'The Post title is required (Language)',
            'rows.*.description.required' => 'The Post description is required (Language)'
        ]);
        $this->tracker;
        if($this->model->storeData($request, $request->category, $request->type, $request->rows, $request->image, $request->tag, $request->status, $request->file_title, $request->file, $request->featured, $request->url, $request->author, $request->datepicker, $request->current_issue)){
            session()->flash('alert-success', $this->panel.' Successfully Added');
        }
        else {
            session()->flash('alert-danger', $this->panel.' can not be added');
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
    public function edit($unique_id)
    {
        $this->tracker;
        $post = $this->model::where('unique_id', '=', $unique_id)->get();
        $data['file'] = $this->file_model::where('unique_id', '=', $unique_id)->get();
        $data['single'] = $this->model::where('unique_id', '=', $unique_id)->first();
        $data['lang'] = $this->dm_post::getLanguage();
        $data['categories'] = $this->dm_post::getJournalCategories();
        return view(parent::loadView($this->view_path.'.edit'), compact('data', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $unique_id)
    {
        $request->validate([
            'rows.*.title' => 'required|max:225',
            'rows.*.description' => 'required',
            'image' => 'image',
            'file_title' => 'array|max:225',
            // 'files' => 'array|mimes:pdf,docx,xlsx',
            // 'tag' => 'required|max:255',
            'status' => 'required|boolean' ,
            'category' => 'required'
        ], [
            'rows.*.title.required' => 'The Posts title is required (Language)',
            'rows.*.description.required' => 'The Posts description is required (Language)'
        ]);
        $this->tracker;
        if($this->model->updateData($request, $request->category, $request->type, $request->rows, $request->image, $request->tag, $request->status, $request->file_title, $request->file, $unique_id, $request->featured, $request->url, $request->author, $request->datepicker, $request->current_issue)){
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
    public function destroy($unique_id)
    {
        $this->tracker;
        $data = $this->model::where('unique_id', '=', $unique_id)->get();
        foreach( $data as $row) {
            $row->deleted_at = new DateTime();
            $row->save();
        }
    }

    public function destroyFile($id) {
        $this->tracker;
        $row = $this->file_model::findOrFail($id);
        $file_path = getcwd(). $row->file;
        if(is_file($file_path)){
            unlink($file_path);
        }
        $data = $this->file_model::destroy($id);
    }

    public function deletedJournal() {
        $this->tracker;
        $data['rows'] = $this->model::where('deleted_at', '!=', null)->where('type', '=', 'page')->where('lang_id', '=', $this->lang_id)->get();
        return view(parent::loadView($this->view_path.'.deleted'), compact('data'));

    }
}
