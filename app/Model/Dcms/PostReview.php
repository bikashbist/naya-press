<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
// use Auth;
use DateTime;
use App\Model\Dcms\File;
use App\Model\Dcms\Language;
use App\Model\Dcms\Category;
use App\Model\Dcms\Eloquent\DM_Post;
use Illuminate\Support\Facades\Auth;

class PostReview extends DM_BaseModel
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'created_at'];
    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
    ];
    protected $guarded = [''];

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'post_reviews';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'post';
    protected $prefix_path_image = '/upload_file/images/post/';
    protected $prefix_path_file = '/upload_file/files/post/';

    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function storeData(Request $request, $category, $type, $order, $rows, $images, $tag, $status, $file_title, $files, $featured, $url, $author)
    {
        $post_unique_id = uniqid(Auth::user()->id . '_');

        // For multiple thumbnail images
        if ($request->hasFile('images')) {
            $post_thumbnail = parent::uploadMultipleImages($request, $this->folder_path_image, $this->prefix_path_image, 'images');
        } else {
            $post_thumbnail = null;
        }

        if (isset($post_thumbnail)) {
            $array_image = $post_thumbnail;  // Already an array, no need to slice or map it
        } else {
            $array_image = null;
        }

        $array_file_title = array_filter($file_title);

        // For multiple files
        if ($request->hasFile('files')) {
            $post_files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'files');
        } else {
            $post_files = null;
        }

        if (isset($post_files) && isset($array_file_title)) {
            $min = min(count($array_file_title), count($post_files));
            $array_file = array_map(null, array_slice($array_file_title, 0, $min), array_slice($post_files, 0, $min));
        } else {
            $array_file = null;
        }

        foreach ($rows as $row) {
            $title = $row['title'] ?? ($row['lang_id'] == 1 ? ($nepaliRow['title'] ?? null) : ($englishRow['title'] ?? null));
            $description = $row['description'] ?? ($row['lang_id'] == 1 ? ($nepaliRow['description'] ?? null) : ($englishRow['description'] ?? null));

            $posts[] = [
                'user_id' => Auth::user()->id,
                'category_id' => $category,
                'lang_id' => $row['lang_id'],
                'post_unique_id' => $post_unique_id,
                'title' => $title, // Use the fallback title if null
                'slug' => Str::slug($title ?? 'no-title'), // Generate slug from the title or fallback
                'content' => $description, // Use the fallback description if null
                'status' => $status,
                'featured' => $featured,
                'url' => $url,
                'author' => $author,
                'tag' => $tag,
                'type' => $type,
                'order' => $order,
                'created_at' => new DateTime(),
            ];
        }

        if (isset($array_file)) {
            foreach ($array_file as $file_row) {
                File::create([
                    'post_unique_id' => $post_unique_id,
                    'title' => $file_row[0],
                    'file' => $file_row[1],
                ]);
            }
        }

        if (isset($array_image)) {
            foreach ($array_image as $file_row) {
                PostImage::create([
                    'post_unique_id' => $post_unique_id,
                    'images' => $file_row, // Save each image
                ]);
            }
        }

        if (Post::insert($posts)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateData(Request $request, $category, $type, $order, $rows, $images, $tag, $status, $file_title, $files, $post_unique_id, $featured, $url, $author)
    {
        // for thumbnail
        // dd($request->hasFile('images'));
        if ($request->hasFile('images')) {
            $post_thumbnail = parent::uploadMultipleImages($request, $this->folder_path_image, $this->prefix_path_image, 'images');
        }
        // else {
        //     $post_thumbnail = Post::findOrFail($rows[0]['id'])->thumbnail;
        // }
        $array_file_title = array_filter($file_title);

        if (isset($post_thumbnail)) {
            $array_image = $post_thumbnail;  // Already an array, no need to slice or map it
        }
        // for  multiple files
        if ($request->hasFile('files')) {
            $post_files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'files');
        } else {
            $post_files = null;
        }
        if (isset($post_files) && isset($array_file_title)) {
            $min = min(count($array_file_title), count($post_files));
            $array_file = array_map(null, array_slice($array_file_title, 0, $min), array_slice($post_files, 0, $min));
        } else {
            $array_file = null;
        }


        $englishRow = null;
        $nepaliRow = null;
        foreach ($rows as $row) {
            if ($row['lang_id'] == 2) { // Assuming lang_id '2' is Nepali
                $nepaliRow = $row;
            }
            if ($row['lang_id'] == 1) { // Assuming lang_id '1' is English
                $englishRow = $row;
            }
        }

        foreach ($rows as $row) {
            if (isset($row['id'])) {
                $post = Post::findOrFail($row['id']);
            } else {
                $post = new Post;
                $post->user_id = Auth::user()->id;
                $post->post_unique_id = $request->post_unique_id;
            }

            $title = $row['title'] ?? ($row['lang_id'] == 1 ? ($nepaliRow['title'] ?? null) : ($englishRow['title'] ?? null));
            $description = $row['description'] ?? ($row['lang_id'] == 1 ? ($nepaliRow['description'] ?? null) : ($englishRow['description'] ?? null));

            $post->category_id = $category;
            $post->lang_id = $row['lang_id'];
            $post->title = $title;
            $post->slug = Str::slug($title);
            $post->content = $description;
            $post->status = $status;
            $post->featured = $featured;
            $post->url = $url;
            $post->author = $author;
            $post->tag = $tag;
            $post->type = $type;
            $post->updated_at = new DateTime();
            $post->order = $order;
            $post->save();
        }
        if (isset($array_file)) {
            foreach ($array_file as $file_row)
                File::create([
                    'post_unique_id' => $post_unique_id,
                    'title' => $file_row[0],
                    'file' => $file_row[1],
                ]);
        }
        if (isset($array_image)) {
            foreach ($array_image as $file_row) {
                PostImage::create([
                    'post_unique_id' => $post_unique_id,
                    'images' => $file_row, // Save each image
                ]);
            }
        }
        if ($post->save()) {
            return true;
        } else {
            return false;
        }
    }
    public function language()
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    public function file()
    {
        return $this->hasMany(File::class, 'post_unique_id');
    }

    public function postCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /** Page Tree */
    public function pageTree($lang_id)
    {
        $data['rows'] =  Post::where('deleted_at', '=', null)->where('featured', '=', 1)->where('status', '=', 1)->where('type', '=', 'page')->where('lang_id', '=', $lang_id)->orderBy('order')->get();
        $ref = [];
        $items = [];
        foreach ($data['rows'] as $row) {
            $thisRef = &$ref[$row->id];
            $thisRef['title'] = $row->title;
            $thisRef['post_unique_id'] = $row->post_unique_id;
            $thisRef['id'] = $row->id;
            $items[$row->id] = &$thisRef;
        }
        return $items;
    }

    /**
     * Build Category | Admin Panel
     */
    public function buildPage($items, $class = 'dd-list')
    {
        $html = "<ol class=\"" . $class . "\" id=\"menu-id\">";
        foreach ($items as $key => $value) {
            $html .= '<li class="dd-item dd3-item" data-id="' . $value['id'] . '">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content"><span id="label_show' . $value['id'] . '">' . $value['title'] . '</span>
                            <span class="span-right">

                                &nbsp;&nbsp;
                                <a class="btn btn-warning" id="' . $value['id'] . '" label="' . $value['title'] . '" href="\dashboard/page/' . $value['post_unique_id'] . '/edit" ><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger del-button" id="' . $value['post_unique_id'] . '" ><i class="fa fa-trash-o"></i></a>
                            </span>
                        </div>';
            if (array_key_exists('child', $value)) {
                $html .= self::buildPage($value['child'], 'child');
            }
            $html .= "</li>";
        }
        $html .= "</ol>";
        return $html;
    }

    // Getter for the HTML menu builder | Admin Panel
    public function getHTML($items)
    {
        return $this->buildPage($items);
    }
}
