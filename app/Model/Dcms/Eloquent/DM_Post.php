<?php

namespace App\Model\Dcms\Eloquent;

use App\Model\Dcms\OtherMenuPost;
use App\Model\Dcms\OtherMenus;
use App\Model\Dcms\PopupImage;
use App\Model\Dcms\PostImage;
use App\Model\Dcms\ProvincePost;
use App\Model\Dcms\Staff;
use App\Model\Dcms\Tag;
use App\Model\Dcms\TagPost;
use Illuminate\Database\Eloquent\Model;
use App\Model\Dcms\Setting;
use App\Model\Dcms\Language;
use App\Model\Dcms\Post;
use App\Model\Dcms\File;
use App\Model\Dcms\Menu;
use App\Model\Dcms\Category;
use App\Model\Dcms\Branch;
use App\Model\Dcms\AffiliatedProgram;
use App\Model\Dcms\AffiliatedPage;
use App\Model\Dcms\JournalCategory;
use App\Model\Dcms\JournalContent;
use App\Model\Dcms\JournalFile;

//use Session;
//use App;
//use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DM_Post extends Model
{
    /**
     * get all the multiple language names
     */
    public static function getLanguage()
    {
        return Language::where('status', '=', 1)->where('deleted_at', '=', null)->get();
    }

    /**
     * to get all the post file using joint post with file
     */
    public static function joinPostFile($post_unique_id)
    {
        return DB::table('posts')
            ->join('files', 'posts.post_unique_id', '=', 'files.post_unique_id')
            ->where('posts.deleted_at', '=', null)
            ->where('posts.post_unique_id', '=', $post_unique_id)
            ->select('posts.*', 'files.title as file_tile', 'files.file')
            ->get();
    }

    /**
     *to get all the post file using joint post with file
     *
     */
    public static function joinSliderName($lang_id)
    {
        return DB::table('sliders')
            ->join('sliders_name', 'sliders.id', '=', 'sliders_name.slider_id')
            ->where('sliders_name.lang_id', '=', $lang_id)
            ->select('sliders.*', 'sliders_name.lang_id', 'sliders_name.name as slider_name', 'sliders_name.description as slider_description')
            ->get();
    }

    /**
     *
     * get the post's id  using post_unique_id
     *  */
    public static function getPostId($post_unique_id)
    {
        return Post::where('post_unique_id', $post_unique_id)
            ->select('id')->get();
    }

    //get categories
    public static function getCategories()
    {
        return Category::get();
    }
    //get categories
    public static function getTags()
    {
        return Tag::get();
    }
    public static function getOthers()
    {
        return OtherMenus::get();
    }

    //get all the post of same language
    public static function getAllPosts($lang_id)
    {
        return Post::where('deleted_at', '=', null)->where('status', '=', 1)->where('type', '=', 'post')->where('lang_id', '=', $lang_id)->get();
    }

    //get all the pages of the same langnuage
    public static function getAllPages($lang_id)
    {
        return Post::where('deleted_at', '=', null)->where('status', '=', 1)->where('type', '=', 'page')->where('lang_id', '=', $lang_id)->get();
    }

    // get single page of particular language
    public static function getSinglePage($post_unique_id, $lang_id)
    {
        $post = Post::where('deleted_at', '=', null)->where('status', '=', 1)->where('type', '=', 'page')->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    // get the single post of particular language
    public static function getSinglePost($post_unique_id, $lang_id)
    {
        // $post = Post::where('deleted_at', '=', null)->where('type', '=', 'post')->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        $post = Post::where('deleted_at', '=', null)->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    // get the single post of particular language
    public static function getSingleOtherPost($post_unique_id, $lang_id)
    {
        // $post = Post::where('deleted_at', '=', null)->where('type', '=', 'post')->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        $post = OtherMenuPost::where('deleted_at', '=', null)->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    public static function getSingleTagPost($post_unique_id, $lang_id)
    {
        // $post = Post::where('deleted_at', '=', null)->where('type', '=', 'post')->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        $post = TagPost::where('deleted_at', '=', null)->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    public static function getSingleProvincePost($post_unique_id, $lang_id)
    {
        // $post = Post::where('deleted_at', '=', null)->where('type', '=', 'post')->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        $post = ProvincePost::where('deleted_at', '=', null)->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }
    // get the file
    public static function getFile($post_unique_id)
    {
        return File::where('post_unique_id', '=', $post_unique_id)->get();
    }

    public static function getImage($post_unique_id)
    {
        return PostImage::where('post_unique_id', '=', $post_unique_id)->get();
    }
    public static function getPopupImage($popup_unique_id)
    {
        // Remove the extra space after 'popup_unique_id'
        return PopupImage::where('popup_unique_id', '=', $popup_unique_id)->get();
    }

    public static function getFirstImage($post_unique_id)
    {
        return PostImage::where('post_unique_id', '=', $post_unique_id)->first();
    }
    //get categories
    public static function getBranch()
    {
        return Branch::get();
    }
    /**
     * download file
     */
    public static function downloadFile($id)
    {
        $file = File::where('id', '=', $id)->first();
        if (isset($file)) {
            $file->increment('download_count');
        }
        $file_path = getcwd() . '/' . $file->file;
        return response()->download($file_path);
    }

    public static function downloadJournalFile($id)
    {
        $file = JournalFile::where('id', '=', $id)->first();
        if (isset($file)) {
            $file->increment('download_count');
        }
        $file_path = getcwd() . '/' . $file->file;
        return response()->download($file_path);
    }
    //get the single category
    public static function getCategory($lang_id, $category_id)
    {
        $data = Category::orderBy('order')
            ->join('categories_name', 'categories.id', '=', 'categories_name.category_id')
            ->where('categories_name.lang_id', '=', $lang_id)
            ->where('categories.id', '=', $category_id)
            ->select('categories.*', 'categories_name.lang_id', 'categories_name.name as category_name')->orderBy('order')
            ->first();
        return $data;
    }
    public static function muMenu($lang_id, $category_id)
    {
        $data = Menu::orderBy('order')

            ->join('menus_name', 'menus.id', '=', 'menus_name.menu_id')
            ->where('menus_name.lang_id', '=', $lang_id)
            ->where('menus.id', '=', $category_id)
            ->select('menus.*', 'menus_name.lang_id', 'menus_name.name as menu_name')->orderBy('order')
            ->first();
        return $data;
    }

    public static function getBranchs($lang_id, $id)
    {
        $data = Branch::orderBy('order')
            ->join('branches_name', 'branches.id', '=', 'branches_name.branch_id')
            ->where('branches_name.lang_id', '=', $lang_id)
            ->where('branches.id', '=', $id)
            ->select('branches.*', 'branches_name.lang_id', 'branches_name.name as branch_name')->orderBy('order')
            ->first();
        return $data;
    }
    public static function getTrending($tag_id)
    {
        $data = Tag::orderBy('order')->where('tags.id', '=', $tag_id)->first();
        return $data;
    }
    public static function getOtherMenu($other_menu_id)
    {
        $data = OtherMenus::orderBy('order')->where('other_menus.id', '=', $other_menu_id)->first();
        return $data;
    }

    //get current news
    public static function getCurrentNews($id, $lang_id)
    {
        $current_news = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $lang_id)->where('deleted_at', '=', null)->orderBy('created_at', 'desc')->take(5)->get();
        //dd($current_news);
        return $current_news;
    }

    //get HOme Page gallery news
    public static function getHomeGallery($id, $lang_id)
    {
        $gallery = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $lang_id)->where('deleted_at', '=', null)->where('thumbnail', '!=', NULL)->orderBy('created_at', 'desc')->take(16)->get();
        //dd($gallery);
        return $gallery;
    }

    //get category base post new 
    public static function categoryPostNew($category_id, $lang_id)
    {
        $date = Carbon::now()->subDays(7);
        return Post::latest('id')->where('deleted_at', '=', null)->where('category_id', '=', $category_id)->where('lang_id', '=', $lang_id)->orderBy('id', 'desc')->where('status', '=', 1)->where('created_at', '>=', $date)->get();
    }



    //get category base post
    public static function categoryPost($category_id, $lang_id, $number = '10')
    {
        return Post::latest('id')->where('deleted_at', '=', null)->where('category_id', '=', $category_id)->where('lang_id', '=', $lang_id)->orderBy('id', 'desc')->where('status', '=', 1)->take($number)->get();
    }

    //get all category base post
    public static function categoryPostAll($category_id, $lang_id)
    {
        return Post::latest('id')->where('deleted_at', '=', null)->where('category_id', '=', $category_id)->where('lang_id', '=', $lang_id)->orderBy('id', 'desc')->where('status', '=', 1)->get();
    }
    //get category base post
    public static function categoryBasedPost($category_id, $lang_id)
    {
        return Post::where('deleted_at', '=', null)->where('category_id', '=', $category_id)->where('lang_id', '=', $lang_id)->where('status', '=', 1)->get();
    }

    //get category base post
    //  public static function branchBasedPost($id, $lang_id)
    //  {
    //      return Staff::where('deleted_at', '=', null)->where('branch_id ', '=', $id)->where('lang_id', '=', $lang_id)->where('status', '=', 1)->get();
    //  }
    public static function branchBasedPost($id, $lang_id)
    {
        return Staff::where('deleted_at', '=', null)
            ->where('branch_id', '=', $id) // Removed the extra space
            ->where('lang_id', '=', $lang_id)
            ->where('status', '=', 1)
            ->orderBy('id', 'desc')
            ->get();
    }
    //get category base post
    public static function tagBasedPost($tag_id, $lang_id)
    {
        return TagPost::where('deleted_at', '=', null)->where('tag_id', '=', $tag_id)->where('lang_id', '=', $lang_id)->where('status', '=', 1)->get();
    }

    public static function otherBasedPost($other_menu_id, $lang_id)
    {
        return OtherMenuPost::where('deleted_at', '=', null)->where('other_menu_id', '=', $other_menu_id)->where('lang_id', '=', $lang_id)->where('status', '=', 1)->get();
    }

    public static function joinMenu($lang_id)
    {
        return DB::table('menus')
            ->join('menus_name', 'menus.id', '=', 'menus_name.menu_id')
            ->where('menus_name.lang_id', '=', $lang_id)
            ->select('menus.*', 'menus_name.lang_id', 'menus_name.name as menu_name')->orderBy('order')
            ->get();
    }

    public static function getMenuDisplay($lang_id)
    {
        return self::joinMenu($lang_id);
    }

    //get all the menu with public status
    public static function getMenu()
    {
        return Menu::where('status', '=', 1)->get();
    }

    public static function getTag()
    {
        return Tag::where('status', '=', 1)->get();
    }

    public static function getOther()
    {
        return OtherMenus::where('status', '=', 1)->get();
    }
    /**
     * Join Album
     */
    public static function joinAlbum($lang_id)
    {
        $album = DB::table('albums')
            ->join('albums_name', 'albums.id', '=', 'albums_name.album_id')
            ->select('albums.*', 'albums_name.title', 'albums_name.lang_id', 'albums_name.description')
            ->where('albums_name.lang_id', '=', $lang_id)
            ->where('albums.status', '=', 1)
            ->get();
        return $album;
    }

    /** used for the session language id | used all over */
    public static function setLanguage()
    {
        if (!Session::has('lang_id')) {
            $default_lang_id = Setting::pluck('language')->first();
            if (!isset($default_lang_id)) {
                $default_lang_id = config('app.fallback_locale');
            }
            Session::put('lang_id', $default_lang_id);
            $lang_id = Session::get('lang_id');
        } else {
            $lang_id = Session::get('lang_id');
        }
        //to set the locale for language file
        App::setLocale(DM_Post::getLangCode($lang_id));
        return $lang_id;
    }

    /** return the language code */
    public static function getLangCode()
    {
        $row = Language::findOrFail(Session::get('lang_id'));
        return $row->code;
    }
    /** return user id if authenticated  */
    public static function userId()
    {
        if (Auth::check()) {
            return Auth::user()->id;
        }
        return null;
    }

    //For Permission
    public function joinRolePermission()
    {
        $permission_role = DB::table('permission_role')
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->where('permission_role.role_id', '=', Auth::user()->role_id)
            ->select('permission_role.*', 'permissions.name', 'permissions.slug')
            ->get();
        return $permission_role;
    }

    public function categoryProgram($category_id, $lang_id, $unique_id)
    {
        return AffiliatedProgram::where('category_id', '=', $category_id)->where('lang_id', '=', $lang_id)->where('affiliated_id', '=', $unique_id)->get();
    }

    /** featured list page */
    public static function featuredPageList($lang_id, $number = 8)
    {
        return Post::where('type', 'page')->where('deleted_at', NULL)->where('lang_id', $lang_id)->where('status', 1)->where('featured', 1)->take($number)->get();
    }

    /** Category List */
    public static function getCategoryList($lang_id, $number = 6)
    {
        $data = DB::table('categories')->orderBy('order')
            ->join('categories_name', 'categories.id', '=', 'categories_name.category_id')
            ->where('categories_name.lang_id', '=', $lang_id)
            ->select('categories.*', 'categories_name.lang_id', 'categories_name.name as category_name')->orderBy('order')
            ->get(6);
        return $data;
    }
    public static function getBranchList($lang_id, $number = 12)
    {
        $data = DB::table('categories')
            ->join('categories_name', 'categories.id', '=', 'categories_name.category_id')
            ->where('categories_name.lang_id', '=', $lang_id)
            ->select('categories.*', 'categories_name.lang_id', 'categories_name.name as category_name')
            ->orderBy('categories.order')  // Ensures the order is based on the 'order' column
            ->limit($number)  // Limit the number of records to $number
            ->get();

        return $data;
    }




    /** Category List */
    public static function getCategoryListAll()
    {
        return Category::orderBy('order')->get();
    }

    //get institute
    public static function getInstitute($lang_id)
    {
        return AffiliatedPage::where('lang_id', '=', $lang_id)->where('status', '=', 1)->where('type', '=', 'institute')->get();
    }

    //get faculty
    public static function getFaculty($lang_id)
    {
        return AffiliatedPage::where('lang_id', '=', $lang_id)->where('status', '=', 1)->where('type', '=', 'faculty')->get();
    }

    public static function getSingleInstitute($unique_id, $lang_id)
    {
        return AffiliatedPage::where('lang_id', '=', $lang_id)->where('status', '=', 1)->where('type', '=', 'institute')->where('unique_id', '=', $unique_id)->first();
    }

    public static function getSingleFaculty($unique_id, $lang_id)
    {
        return AffiliatedPage::where('lang_id', '=', $lang_id)->where('status', '=', 1)->where('type', '=', 'faculty')->where('unique_id', '=', $unique_id)->first();
    }

    /** Return affiliated table's name based on unique id */
    public static function getAffiliatedName($unique_id)
    {
        return AffiliatedPage::where('unique_id', '=', $unique_id)->pluck('title')->first();
    }

    /** Return affiliated table's name based on unique id */
    public static function getJournalName($unique_id)
    {
        return JournalContent::where('unique_id', '=', $unique_id)->pluck('title')->first();
    }

    /** Return affiliated table's name based on unique id */
    public static function getContentName($unique_id)
    {
        return JournalContent::where('post_unique_id', '=', $unique_id)->pluck('title')->first();
    }

    public static function getLanguageName($id)
    {
        return Language::where('id', '=', $id)->pluck('name')->first();
    }

    /** Get Journal Controller  */
    public static function getJournalCategories()
    {
        return JournalCategory::where('status', '=', 1)->get();
    }

    public static function getJournalCategory($id)
    {
        return JournalCategory::where('id', '=', $id)->first();
    }

    //get category base post
    public static function categoryBasedJournal($id, $lang_id)
    {
        return JournalContent::where('deleted_at', '=', null)->where('category_id', '=', $id)->where('lang_id', '=', $lang_id)->where('status', '=', 1)->paginate(12);
    }

    public static function getSingleJournal($unique_id, $lang_id)
    {
        $journal = JournalContent::where('deleted_at', '=', null)->where('status', '=', 1)->where('unique_id', '=', $unique_id)->where('lang_id', '=', $lang_id)->first();
        if (isset($journal)) {
            $journal->increment('visit_no');
        }
        return $journal;
    }

    // get the file
    public static function getJournalFile($unique_id)
    {
        return JournalFile::where('unique_id', '=', $unique_id)->get();
    }

    public static function getSingleBranch($id)
    {
        return Branch::where('status', '=', 1)->findOrFail($id);
    }

    public static function getBranches()
    {
        return Branch::get();
    }

    public static function getSingleBranchPost($staff_unique_id, $lang_id)
    {
        // $post = Post::where('deleted_at', '=', null)->where('type', '=', 'post')->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        $post = Staff::where('deleted_at', '=', null)->where('staff_unique_id', '=', $staff_unique_id)->where('lang_id', '=', $lang_id)->first();
        // if (isset($post)) {
        //     $post->increment('visit_no');
        // }
        return $post;
    }
    public static function getBranchMenu($branch_menu_id)
    {
        $data = Staff::orderBy('order')->where('branch_menu_id.id', '=', $branch_menu_id)->first();
        return $data;
    }
    public static function getType($segment_1, $segment_2, $lang_id)
    {
        // dd($segment_1);
        if ($segment_1 == "post" || $segment_1 == "page") {
            return Post::where('post_unique_id', '=', $segment_2)->where('lang_id', '=', $lang_id)->first();
        } else {
            return Category::where('id', '=', $segment_2)->first();
        }

    }
}
