<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use DateTime;
use App\Model\Dcms\File;
use App\Model\Dcms\Language;
use App\Model\Dcms\Category;
use App\Model\Dcms\Eloquent\DM_Post;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ProvincePost extends DM_BaseModel
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'created_at'];

    protected $guarded = [''];

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'province_posts';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'province_posts';
    protected $prefix_path_image = '/upload_file/images/province_posts/';
    protected $prefix_path_file = '/upload_file/files/province_posts/';

    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function storeData(Request $request, $province, $district, $type, $rows, $image, $status, $file_title, $files)
    {
        $post_unique_id = uniqid(FacadesAuth::user()->id . '_');
        // for thumbnail
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
            $title = $row['title'] ?? ($row['lang_id'] == 1 ? ($nepaliRow['title'] ?? null) : ($englishRow['title'] ?? null));
            $description = $row['description'] ?? ($row['lang_id'] == 1 ? ($nepaliRow['description'] ?? null) : ($englishRow['description'] ?? null));
            $province_posts[] = [
                'user_id' => Auth::user()->id,
                'province_id' => $province,
                'district_id' => $district,
                'lang_id' => $row['lang_id'],
                'post_unique_id' => $post_unique_id,
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => $description,
                'type' => $type,
                'status' => $status,
                'created_at' => new DateTime(),
            ];
        }

        if (isset($array_image)) {
            foreach ($array_image as $file_row) {
                PostImage::create([
                    'post_unique_id' => $post_unique_id,
                    'images' => $file_row, // Save each image
                ]);
            }
        }
        if (ProvincePost::insert($province_posts)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateData(Request $request, $type, $province, $district, $rows, $image,  $status, $file_title, $files, $post_unique_id)
    {
        // for thumbnail
        if ($request->hasFile('images')) {
            $post_thumbnail = parent::uploadMultipleImages($request, $this->folder_path_image, $this->prefix_path_image, 'images');
        }

        if (isset($post_thumbnail)) {
            $array_image = $post_thumbnail;  // Already an array, no need to slice or map it
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
                $pro_post = ProvincePost::findOrFail($row['id']);
            } else {
                $pro_post = new ProvincePost;
                $pro_post->user_id = Auth::user()->id;
                $pro_post->post_unique_id = $request->post_unique_id;
            }
            $title = $row['title'] ?? ($row['lang_id'] == 1 ? ($nepaliRow['title'] ?? null) : ($englishRow['title'] ?? null));
            $description = $row['description'] ?? ($row['lang_id'] == 1 ? ($nepaliRow['description'] ?? null) : ($englishRow['description'] ?? null));

            $pro_post->province_id = $province;
            $pro_post->district_id = $district;
            $pro_post->lang_id = $row['lang_id'];
            $pro_post->title = $title;
            $pro_post->slug = Str::slug($title);
            $pro_post->content = $description;
            $pro_post->status = $status;
            $pro_post->type = $type;
            $pro_post->updated_at = new DateTime();
            $pro_post->save();
        }

        if (isset($array_image)) {
            foreach ($array_image as $file_row) {
                PostImage::create([
                    'post_unique_id' => $post_unique_id,
                    'images' => $file_row,
                ]);
            }
        }
        if ($pro_post->save()) {
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

    // public function postOtherMenu() {
    //     return $this->belongsTo(OtherMenus::class, 'other_menu_id');
    // }

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



    public function getProvinceId()
    {
        return $this->belongsTo('App\Model\Dcms\Provinces', 'province_id');
    }

    public function getDistrictId()
    {
        return $this->belongsTo('App\Model\Dcms\Districts', 'district_id');
    }

    public function districts()
    {
        return $this->hasMany(Districts::class, 'province_id');
    }

    public function getdistricts()
    {
        return $this->belongsTo(Districts::class, 'province_id');
    }
}
