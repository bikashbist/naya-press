<?php

namespace App\Http\Controllers\Dcms;

use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Post;
use App\Model\Dcms\File;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\PostImage;
use DB;
use Illuminate\Support\Str;
use Auth;
use DateTime;
use App\Model\Dcms\Tracker;
use Illuminate\Support\Facades\Validator;
use Response;


class PostsController extends DM_BaseController
{

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table;


    public function __construct(Request $request, Post $post, File $file, DM_Post $dm_post, Tracker $tracker)
    {
        $this->middleware('auth');
        $this->middleware('permission:page-list', ['only' => ['indexPage']]);
        $this->middleware('permission:page-create', ['only' => ['createPage', 'storePage']]);
        $this->middleware('permission:page-edit', ['only' => ['editPage', 'updatePage']]);
        $this->middleware('permission:page-delete', ['only' => ['destroy']]);
        $this->middleware('permission:delete-file', ['only' => ['destroyFile']]);
        $this->middleware('permission:deleted-page', ['only' => ['deletedPage']]);
        $this->middleware('permission:post-list', ['only' => ['indexPost']]);
        $this->middleware('permission:post-create', ['only' => ['createPost', 'storePost']]);
        $this->middleware('permission:post-edit', ['only' => ['editPost', 'updatePost']]);
        $this->middleware('permission:page-delete', ['only' => ['destroy']]);
        $this->middleware('permission:deleted-post', ['only' => ['deletedPost']]);
        $this->middleware('permission:delete-post-permanently', ['only' => ['permanentDelete']]);
        $this->middleware('permission:restore-post', ['only' => ['restore']]);
        $this->model = $post;
        $this->file_model = $file;
        $this->table = DB::table('posts');
        $this->dm_post = $dm_post;
        $this->lang_id = $dm_post::setLanguage();
        $this->tracker = $tracker::hit();
    }
    /** ===================================PAGE================================================== */
    public function indexPage()
    {
        $this->tracker;
        $this->panel = 'Pages';
        $this->base_route = 'dcms.page';
        $this->view_path = 'dcms.page';
        $data['rows'] = $this->model::where('type', '=', 'page')->where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function createPage()
    {
        $this->tracker;
        $this->panel = 'Pages';
        $this->base_route = 'dcms.page';
        $this->view_path = 'dcms.page';
        $data['lang'] = $this->dm_post::getLanguage();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }
    public function storePage(Request $request)
    {
        dd("d");
        $request->validate([
            'rows.*.title' => 'required|max:225',
            'rows.*.description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:50000',
            'file_title' => 'array|max:225',
            // 'files' => 'array|mimes:pdf,docx,xlsx',
            // 'tag' => 'required|max:255',
            'status' => 'required|boolean'
        ], [
            'rows.*.title.required' => 'The Page title is required (Language)',
            'rows.*.description.required' => 'The Page description is required (Language)'
        ]);
        $this->tracker;
        $this->panel = 'Pages';
        $this->base_route = 'dcms.page';
        $this->view_path = 'dcms.page';
        if ($this->model->storeData($request, $request->category, $request->type, '', $request->rows, $request->image, $request->tag, $request->status, $request->file_title, $request->file, $request->featured, $request->url, $request->author)) {
            session()->flash('alert-success', $this->panel . ' Successfully Added');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be added');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function editPage(Request $request, $post_unique_id)
    {
        $this->tracker;

        $this->panel = 'Pages';
        $this->base_route = 'dcms.page';
        $this->view_path = 'dcms.page';
        $post = $this->model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['file'] = $this->file_model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['single'] = $this->model::where('post_unique_id', '=', $post_unique_id)->first();
        $data['lang'] = $this->dm_post::getLanguage();
        return view(parent::loadView($this->view_path . '.edit'), compact('data', 'post'));
    }
    public function updatePage(Request $request, $post_unique_id)
    {
        $request->validate([
            'rows.*.title' => 'required|max:225',
            'rows.*.description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:50000',
            'file_title' => 'array|max:225',
            // 'files' => 'array|mimes:pdf,docx,xlsx',
            // 'tag' => 'required|max:255',
            'status' => 'required|boolean'
        ], [
            'rows.*.title.required' => 'The Page title is required (Language)',
            'rows.*.description.required' => 'The Page description is required (Language)'
        ]);
        $this->tracker;
        $this->panel = 'Pages';
        $this->base_route = 'dcms.page';
        $this->view_path = 'dcms.page';
        if ($this->model->updateData($request, $request->category, $request->type,  '', $request->rows, $request->image, $request->tag, $request->status, $request->file_title, $request->file, $post_unique_id, $request->featured, $request->url, $request->author)) {
            session()->flash('alert-success', $this->panel . ' Successfully updated');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be updated');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function destroy($post_unique_id)
    {
        $this->tracker;
        $data = $this->model::where('post_unique_id', '=', $post_unique_id)->get();
        foreach ($data as $row) {
            $row->deleted_at = new DateTime();
            $row->save();
        }
    }
    public function destroyFile($id)
    {
        $this->tracker;
        $row = $this->file_model::findOrFail($id);
        $file_path = getcwd() . $row->file;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $data = $this->file_model::destroy($id);
    }

    public function deletedPage()
    {
        $this->tracker;
        $this->panel = 'Pages';
        $this->base_route = 'dcms.page';
        $this->view_path = 'dcms.page';
        $data['rows'] = Post::where('deleted_at', '!=', null)->where('type', '=', 'page')->where('lang_id', '=', $this->lang_id)->get();
        return view(parent::loadView($this->view_path . '.deleted'), compact('data'));
    }

    public function featuredPage()
    {
        $this->tracker;
        $this->panel = 'Pages';
        $this->base_route = 'dcms.page';
        $this->view_path = 'dcms.page';
        // $data['rows'] = Post::where('deleted_at', '=', null)->where('featured', '=', 1)->where('type', '=', 'page')->where('lang_id', '=', $this->lang_id)->get();
        $items = $this->model->pageTree($this->lang_id);
        $page = $this->model->getHtml($items);
        return view(parent::loadView($this->view_path . '.featured'), compact('page'));
    }

    /** Store the order from ajax */
    public function storeOrder(Request $request)
    {
        if ($request->ajax()) {
            $data = json_decode($_POST['data']);
            $readbleArray = parent::ParseJsonArray($data);
            $i = 0;
            foreach ($readbleArray as $row) {
                $i++;
                // $menu = $this->model::where('post_unique_id', '=', $row['unique'])->get();
                $page = $this->model::findOrFail($row['id']);
                $page_unique = $this->model::where('post_unique_id', '=', $page->post_unique_id)->get();
                foreach ($page_unique as $stf) {
                    $staff = $this->model::findOrFail($stf->id);
                    $staff->order = $i;
                    $staff->save();
                }
            }
            return var_dump(Response::json($readbleArray));
        }
    }

    /** ================================POST==================================================== */
    /**
     * Post index
     */
    public function indexPost()
    {
        $this->panel = 'Posts';
        $this->base_route = 'dcms.post';
        $this->view_path = 'dcms.post';
        $data['rows'] = $this->model::where('type', '=', 'post')->where('deleted_at', '=', null)->where('lang_id', '=', $this->lang_id)->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function createPost()
    {
        $this->tracker;
        $this->panel = 'Posts';
        $this->base_route = 'dcms.post';
        $this->view_path = 'dcms.post';
        $data['lang'] = $this->dm_post::getLanguage();
        $data['categories'] = $this->dm_post::getCategories();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }
    public function storePost(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'rows.*.title' => 'nullable|max:225',
            'rows.*.description' => 'nullable',
            'images.*' => 'mimes:jpeg,jpg,png,gif|max:5000',  // Validate each image
            'file_title' => 'array|max:225',
            'files.*' => 'mimes:pdf,docx,xlsx|max:50000',  // Validate each file
            'status' => 'required|boolean',
            'category' => 'required'
        ]);
        $validator->after(function ($validator) use ($request) {
            // Check if there is at least one title or description across all rows
            $hasTitle = collect($request->input('rows'))->pluck('title')->filter()->isNotEmpty();
            $hasDescription = collect($request->input('rows'))->pluck('description')->filter()->isNotEmpty();

            // If no title and no description is present, fail validation
            if (!$hasTitle && !$hasDescription) {
                $validator->errors()->add('rows', 'At least one title or one description is required across all rows.');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $this->tracker;
        $this->panel = 'Posts';
        $this->base_route = 'dcms.post';
        $this->view_path = 'dcms.post';

        if ($this->model->storeData($request, $request->category, $request->type, $request->order, $request->rows, $request->images, $request->tag, $request->status, $request->file_title, $request->file, $request->featured, $request->url, $request->author)) {
            session()->flash('alert-success', $this->panel . ' Successfully Added');
        } else {
            session()->flash('alert-danger', $this->panel . ' cannot be added');
        }

        return redirect()->route($this->base_route . '.index');
    }
    public function editPost(Request $request, $post_unique_id)
    {
        $this->tracker;
        $this->panel = 'Posts';
        $this->base_route = 'dcms.post';
        $this->view_path = 'dcms.post';
        $post = $this->model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['file'] = $this->file_model::where('post_unique_id', '=', $post_unique_id)->get();
        $data['single'] = $this->model::where('post_unique_id', '=', $post_unique_id)->first();
        $data['lang'] = $this->dm_post::getLanguage();
        $data['categories'] = $this->dm_post::getCategories();
        $data['images'] = PostImage::where('post_unique_id', $post_unique_id)->get();
        return view(parent::loadView($this->view_path . '.edit'), compact('data', 'post'));
    }
    public function updatePost(Request $request, $post_unique_id)
    {
    
        $data = $request->all();
        $validator = Validator::make($data, [
            'rows.*.title' => 'nullable|max:225',
            'rows.*.description' => 'nullable',
            'images.*' => 'mimes:jpeg,jpg,png,gif|max:5000',  // Validate each image
            'file_title' => 'array|max:225',
            'files.*' => 'mimes:pdf,docx,xlsx|max:50000',  // Validate each file
            'status' => 'required|boolean',
            'category' => 'required'
        ]);
        $validator->after(function ($validator) use ($request) {
            // Check if there is at least one title or description across all rows
            $hasTitle = collect($request->input('rows'))->pluck('title')->filter()->isNotEmpty();
            $hasDescription = collect($request->input('rows'))->pluck('description')->filter()->isNotEmpty();

            // If no title and no description is present, fail validation
            if (!$hasTitle && !$hasDescription) {
                $validator->errors()->add('rows', 'At least one title or one description is required across all rows.');
            }
        });
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->tracker;
        $this->panel = 'Posts';
        $this->base_route = 'dcms.post';
        $this->view_path = 'dcms.post';
        if ($this->model->updateData($request, $request->category, $request->type, $request->order, $request->rows, $request->images, $request->tag, $request->status, $request->file_title, $request->file, $post_unique_id, $request->featured, $request->url, $request->author)) {
            session()->flash('alert-success', $this->panel . ' Successfully updated');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be updated');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function deletedPost()
    {
        $this->tracker;
        $this->panel = 'Posts';
        $this->base_route = 'dcms.post';
        $this->view_path = 'dcms.post';
        $data['rows'] = Post::where('deleted_at', '!=', null)->where('type', '=', 'post')->where('lang_id', '=', $this->lang_id)->get();
        return view(parent::loadView($this->view_path . '.deleted'), compact('data'));
    }


    public function restore($post_unique_id)
    {
        $this->tracker;
        $data = $this->model::where('post_unique_id', '=', $post_unique_id)->get();
        foreach ($data as $row) {
            $row->deleted_at = null;
            $row->save();
        }
    }

    public function permanentDelete($post_unique_id)
    {
        $this->tracker;
        $data = $this->model::where('post_unique_id', '=', $post_unique_id)->get();
        foreach ($data as $row) {
            $this->model::where('post_unique_id', '=', $post_unique_id)->delete();
        }
    }

    public function delete_multiple_image($id)
    {
        $data =  PostImage::findorfail($id);
        $data->delete();
        session()->flash('alert-danger', 'Image Successfully delete');

        return redirect()->back();
    }
}
