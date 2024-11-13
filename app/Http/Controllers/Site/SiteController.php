<?php

namespace App\Http\Controllers\Site;

use App\Model\Dcms\Admission;
use App\Model\Dcms\Advistement;
use App\Model\Dcms\DonateNow;
use App\Model\Dcms\OtherMenus;
use App\Model\Dcms\PostReview;
use App\Model\Dcms\ProvincePost;
use App\Model\Dcms\SuccessStory;
use App\Model\Dcms\Tag;
use App\Model\Dcms\Districts;
use App\Model\Dcms\Provinces;
use Illuminate\Http\Request;
use App\Http\Controllers\Dcms\DM_BaseController;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\Menu;
use App\Model\Dcms\Payment;
use App\Model\Dcms\Contact;
use App\Model\Dcms\Tracker;
use App\Model\Dcms\Setting;
use App\Model\Dcms\Branch;
use App\Model\Dcms\Album;
use App\Model\Dcms\Post;
use App\Model\Dcms\Staff;
use App\Model\Dcms\Link;
use App\Model\Dcms\Data;
use App\Model\Dcms\SchoolsData;
use App\Model\Dcms\ScholarshipData;
use App\Model\Dcms\Service;
use App\Model\Dcms\AffiliatedBanner;
use App\Model\Dcms\AffiliatedPage;
use App\Model\Dcms\AffiliatedFile;
use App\Model\Dcms\AffiliatedProgramCategory;
use App\Model\Dcms\AffiliatedProgram;
use App\Model\Dcms\AffiliatedCollage;
use App\Model\Dcms\AffiliatedStaff;
use App\Model\Dcms\Audio;
use App\Model\Dcms\Category;
use App\Model\Dcms\Province;
use App\Model\Dcms\JournalCategory;
use App\Model\Dcms\Campus;
use App\Model\Dcms\CentralDepartment;
use App\Model\Dcms\Common;
use App\Model\Dcms\Popup;
use App\Model\Dcms\Video;
use App\Model\Dcms\File;
use App\User;
use Illuminate\Support\Facades\DB;
//use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class SiteController extends DM_BaseController
{
    protected $panel;
    protected $base_route = 'site';
    protected $view_path = 'site';
    protected $model;
    protected $table;
    protected $contact_email;
    protected $dm_post;
    protected $lang_id;
    protected $tracker;

    public function __construct(Request $request, DM_Post $dm_post, Tracker $tracker, Setting $setting)
    {
        $this->dm_post = $dm_post;
        $this->lang_id = $dm_post::setLanguage();
        $this->tracker = $tracker::hit();
        $this->contact_email = $setting::pluck('contact_email')->first();
    }

    /** Home Page */
    public function index()
    {
        $this->panel = "Home";
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['lang'] = $this->lang_id;
        $data['slider'] = $this->dm_post::joinSliderName($this->lang_id);
        $data['album'] = $this->dm_post::joinAlbum($this->lang_id);
        $data['member'] = Staff::where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->orderBy('order')->get();
        $data['footer_staff'] = Staff::where('branch_id', '=', 6)->where('lang_id', '=', $this->lang_id)->orderBy('order')->first();
        $data['data'] = Data::where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->orderBy('order')->get();
        $data['service'] = Service::where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->orderBy('order', 'ASC')->take(8)->get();
        $data['featured_pages'] = $this->dm_post::featuredPageList($this->lang_id, 11);
        $data['branch'] = Branch::where('status', '=', 1)->orderBy('order')->get();
        $i = 0;
        foreach ($data['featured_pages'] as $row) {
            $featured_page[$i] = $row;
            $i++;
        }
        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 6);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 12;
            } elseif ($k == 2) {
                $j = 12;
            } else {
                $j = 4;
            }
            $data['cat_post'][$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $data['cat'][$k] = $row->id;
            $k++;
        }
        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 6);
        // dd($data['category']);
        $data['current_news'] = $this->dm_post::getCurrentNews(2, $this->lang_id);

        $data['gallery_news'] = $this->dm_post::getHomeGallery(2, $this->lang_id);
        foreach ($data['category'] as $row) {
            //dd($row);
            $data['cat_post_' . $row->name] = $this->dm_post::categoryPost($row->id, $this->lang_id, '10');
            $data['cat_' . $row->name] = $row->id;
        }
        $data['video'] = Video::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->take(8)->get();
        // Fetch the popup data
        $data['popup'] = Popup::where('status', '=', 1)
            ->where('lang_id', '=', $this->lang_id)
            ->orderBy('order', 'desc')
            ->first();

        // Check if popup exists and then retrieve associated images
        if ($data['popup']) {
            $data['pop'] = $this->dm_post::getPopupImage($data['popup']->popup_unique_id);
        } else {
            $data['pop'] = null; // In case no popup is found, set it to null
        }

        $data['link'] = Link::where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->orderBy('order')->take(8)->get();
        $data['album'] = $this->dm_post::joinAlbum($this->lang_id);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();

        // Added by sandip gyawali 
        // Latest post
        $data['latest_post'] = Post::where('status', '1')->where('lang_id', '=', $this->lang_id)->latest('id')->where('deleted_at', '=', null)->first();

        $data['image'] = $this->dm_post::getFirstImage($data['latest_post']->post_unique_id);

        $data['province'] = Post::where('category_id', 1)->where('status', '1')->where('lang_id', '=', $this->lang_id)->latest('id')->where('deleted_at', '=', null)->get();

        $artha_ids = Category::where('parent_id', 3)->pluck('id');
        $data['aartha_post'] = Post::whereIn('category_id', $artha_ids)->where('status', '1')->where('lang_id', '=', $this->lang_id)->latest('id')->where('deleted_at', '=', null)->get();

        $purva_ids = Category::where('parent_id', 4)->pluck('id');
        $data['purva'] = Post::whereIn('category_id', $purva_ids)->where('status', '1')->where('lang_id', '=', $this->lang_id)->latest('id')->where('deleted_at', '=', null)->get();

        $tathyanka_ids = Category::where('parent_id', 5)->pluck('id');
        $data['tathyanka'] = Post::whereIn('category_id', $tathyanka_ids)->where('status', '1')->where('lang_id', '=', $this->lang_id)->latest('id')->where('deleted_at', '=', null)->get();

        $jaalmausam_ids = Category::where('parent_id', 6)->pluck('id');
        $data['jaalmausam'] = Post::whereIn('category_id', $jaalmausam_ids)->where('status', '1')->where('lang_id', '=', $this->lang_id)->latest('id')->where('deleted_at', '=', null)->get();

        $paryatan_ids = Category::where('parent_id', 106)->pluck('id');
        $data['paryatan'] = Post::whereIn('category_id', $paryatan_ids)->where('status', '1')->where('lang_id', '=', $this->lang_id)->latest('id')->where('deleted_at', '=', null)->get();
        $purvadharvikash_ids = Category::where('parent_id', 4)->pluck('id');
        $data['purvadharvikash'] = Post::whereIn('category_id', $purvadharvikash_ids)->where('status', '1')->where('lang_id', '=', $this->lang_id)->latest('id')->where('deleted_at', '=', null)->get();

        $data['vastachar'] = Post::where('category_id', 20)->where('status', '1')->where('lang_id', '=', $this->lang_id)->latest('id')->where('deleted_at', '=', null)->get();

        $special_wordsids = Category::where('parent_id', 109)->pluck('id');
        $data['special_words'] = Post::whereIn('category_id', $special_wordsids)->where('status', '1')->where('lang_id', '=', $this->lang_id)->latest('id')->where('deleted_at', '=', null)->get();

        $data['khadyasurukshya'] = Staff::where('id', 11)->get();
        $data['adv'] = Advistement::where('status', '=', 1)->get();
        // // Fetch the first-ranked advertisement
        // $data['first_adv'] = Advistement::where('status', 1)
        // ->orderBy('rank', 'asc')
        // ->first(); // Fetch a single record

        // // Fetch the second-ranked advertisement
        // $data['second_adv'] = Advistement::where('status', 1)
        // ->orderBy('rank', 'asc')
        // ->skip(1) // Skip the first result
        // ->first(); // Fetch the next one

        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);

        $data['provinces'] = ProvincePost::where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->get();

        $data['province_post'] = ProvincePost::where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show contact Form
     */
    public function showContact()
    {
        $this->panel = "Contact";
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $this->view_path = 'site.';
        $this->tracker; // to track user
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 6);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }

        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.contact'), compact('data', 'cat_post', 'cat'));
    }
    /**
     * Show video Form
     */
    public function showVideo()
    {
        $this->panel = "Contact";
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $this->view_path = 'site.';
        $data['lang'] = $this->lang_id;
        $this->tracker; // to track user
        $data['current_news'] = $this->dm_post::getCurrentNews(25, $this->lang_id);
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 6);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['video'] = Video::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.video'), compact('data', 'cat_post', 'cat'));
    }
    //
    /**
     * Show contact Form
     */
    public function Unicode()
    {
        // dd('here');
        $this->panel = "Contact";
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $this->view_path = 'site.';
        $this->tracker; // to track user
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 6);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.unicode'), compact('data', 'cat_post', 'cat'));
    }
    /** Store Message From Contact Us */
    // public function storeMessage(Request $request)
    // {
    //     $this->tracker; // to track user
    //     $request->validate([
    //         'name'     => 'required|max:255',
    //         'email'    => 'required',
    //         'number'   => 'required',
    //         'message'  => 'required',
    //         'subject' => 'required',
    //     ]);
    //     $data = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'number' => $request->number,
    //         'message' => $request->message,
    //         'subject' => $request->subject,
    //     ];
    //     //$file = $request->file;

    //     if ($data) {
    //         $request->session()->flash('alert-success', 'Message Send Successfully.');
    //     } else {
    //         $request->session()->flash('alert-danger', 'Sorry! ');
    //     }
    //     // Sending Mail to Owner
    //     // Mail::send('site.emails.contact', $data, function ($message) use ($data, $file) {
    //     //     $message->from($data['email']);
    //     //     $message->to($this->contact_email);
    //     //     $message->subject('Mail From Office of the Chief Justice, Nepal | Madhes Pradesh, Janakpurdham, Nepal');
    //     //     if (!empty($file)) {
    //     //         foreach ($file as $file) {
    //     //             $message->attach($file);
    //     //         }
    //     //     }
    //     // });
    //     // Sending Response To Sender
    //     // Mail::send('site.emails.response', $data, function ($message) use ($data) {
    //     //     $message->from($this->contact_email);
    //     //     $message->to($data['email']);
    //     //     $message->subject('Thankyou !! From Office of the Chief Justice, Nepal | Madhes Pradesh, Janakpurdham, Nepal');
    //     // });


    //     return redirect()->back();
    // }
    public function storeMessage(Request $request)
    {
        $this->tracker; // to track user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'number' => 'nullable',
            'message' => 'required',
            'subject' => 'nullable',
        ]);
        Contact::create($request->all());
        $notification = array(
            'message' => 'Message sent successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //to show post
    public function showPost($post_unique_id)
    {
        //

        $this->tracker;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['row'] = $this->dm_post::getSinglePost($post_unique_id, $this->lang_id);
        $data['file'] = $this->dm_post::getFile($post_unique_id);
        $data['image'] = $this->dm_post::getImage($post_unique_id);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['rows'] = $this->dm_post::categoryBasedPost($data['row']->category_id, $this->lang_id);
        $data['cat'] = $this->dm_post::getCategory($this->lang_id, $data['row']->category_id);

        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 6);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }

        foreach ($data['category'] as $row) {
            //dd($row);
            $data['cat_post_' . $row->name] = $this->dm_post::categoryPost($row->id, $this->lang_id, '4');
            $data['cat_' . $row->name] = $row->id;
        }

        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.singlepost'), compact('data', 'cat_post', 'cat'));
    }
    /** Show Single Page */
    public function showPage($post_unique_id)
    {
        $this->tracker;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['row'] = $this->dm_post::getSinglePage($post_unique_id, $this->lang_id);
        $data['file'] = $this->dm_post::getFile($post_unique_id);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 6);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }

        foreach ($data['category'] as $row) {
            //dd($row);
            $data['cat_post_' . $row->name] = $this->dm_post::categoryPost($row->id, $this->lang_id, '4');
            $data['cat_' . $row->name] = $row->id;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.single'), compact('data', 'cat_post', 'cat'));
    }

    //to show post category with post archive
    public function showCategoryPost($category_id)
    {
        $this->tracker;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::categoryBasedPost($category_id, $this->lang_id);
        $data['menu_cat'] = $this->dm_post::muMenu($this->lang_id, $category_id);
        $data['cat'] = $this->dm_post::getCategory($this->lang_id, $category_id);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 6);
        //        dd($data['category']);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }
        foreach ($data['category'] as $row) {
            //dd($row);
            $data['cat_post_' . $row->name] = $this->dm_post::categoryPost($row->id, $this->lang_id, '4');
            $data['cat_' . $row->name] = $row->id;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.category'), compact('data', 'cat_post', 'cat'));
    }

    //download the file
    public function downloadFile($id)
    {
        $file = $this->dm_post::downloadFile($id);
        return $file;
    }
    /** Show All Post Collection */
    public function showAllPost()
    {
        $this->tracker;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::getAllPosts($this->lang_id);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        return view(parent::loadView($this->view_path . '.category'), compact('data'));
    }


    public function showAllPage()
    {

        $this->tracker;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::getAllPages($this->lang_id);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        return view(parent::loadView($this->view_path . '.category'), compact('data'));
    }


    public function showAllCategory()
    {

        $this->tracker;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::getCategories();
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        return view(parent::loadView($this->view_path . '.category'), compact('data'));
    }
    /**
     * shows album
     */
    public function showAlbum()
    {

        $this->tracker;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['album'] = $this->dm_post::joinAlbum($this->lang_id);

        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 3);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        // $data['album'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->where('deleted_at', '=', null)->where('thumbnail','!=',NULL)->orderBy('created_at', 'desc')->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.album'), compact('data', 'cat_post', 'cat'));
    }
    /**
     * show photos
     */
    public function showPhotos($album_id)
    {
        $this->tracker;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['album'] = Album::findOrFail($album_id);
        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 3);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.gallery'), compact('data', 'cat_post', 'cat'));
    }

    public function showStaff()
    {
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['lang'] = $this->lang_id;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['service'] = Service::where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->orderBy('order')->take(10)->get();
        $data['branch'] = Branch::where('status', '=', 1)->orderBy('order')->get();
        $lang_id = $this->lang_id;
        $data['quick_links'] = Link::where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->orderBy('order')->get();
        $data['featured_pages'] = $this->dm_post::featuredPageList($this->lang_id, 1);
        $i = 0;

        foreach ($data['featured_pages'] as $row) {
            $featured_page[$i] = $row;
            $i++;
        }
        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList(3);
        $data['count_cat'] = count($data['category']);
        foreach ($data['category'] as $row) {
            $data['cat_post_' . $row->slug] = $this->dm_post::categoryPost($row->id, $this->lang_id, $data['count_cat']);
            $data['cat_' . $row->slug] = $row->id;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.branch'), compact('data', 'lang_id'));
    }
    /** Function for swapping languages */
    public function swapLanguage($lang_id)
    {
        Session::put('lang_id', $lang_id);
        return back();
    }

    public function search(Request $request)
    {

        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['lang'] = $this->lang_id;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 3);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }

        $query = $request->get('keyword');
        $data['rows'] = Post::where('deleted_at', '=', null)
            ->where('lang_id', '=', $this->lang_id)
            ->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('content', 'LIKE', '%' . $query . '%')
            ->orWhere('tag', 'LIKE', '%' . $query . '%')
            ->orWhere('author', 'LIKE', '%' . $query . '%')->paginate(10);
        $data['result_count'] = count($data['rows']);

        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.search'), compact('data', 'cat_post', 'cat'));
    }

    /** Institute */

    public function showInstitute($unique_id)
    {
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['page'] = AffiliatedPage::where('unique_id', '=', $unique_id)->where('lang_id', '=', $this->lang_id)->where('status', '=', 1)->first();
        $data['program_cat'] = AffiliatedProgramCategory::all();
        foreach ($data['program_cat'] as $row) {
            $data['cat_program_' . $row->slug] = $this->dm_post->categoryProgram($row->id, $this->lang_id, $unique_id);
            $data['cat_slug' . $row->slug] = $row->id;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);

        $data['constituent'] = AffiliatedCollage::where('lang_id', '=', $this->lang_id)->where('status', '=', 1)->where('campus_type', '=', "constituent")->where('affiliated_id', '=', $unique_id)->get();
        $data['affiliated'] = AffiliatedCollage::where('lang_id', '=', $this->lang_id)->where('status', '=', 1)->where('campus_type', '=', "affiliated")->where('affiliated_id', '=', $unique_id)->get();
        $data['staff'] = AffiliatedStaff::where('lang_id', '=', $this->lang_id)->where('affiliated_id', '=', $unique_id)->where('status', '=', 1)->get();
        $data['slider'] = AffiliatedBanner::where('affiliated_id', '=', $unique_id)->where('lang_id', '=', $this->lang_id)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.page'), compact('data'));
    }


    public function showFaculty($unique_id)
    {
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['page'] = AffiliatedPage::where('unique_id', '=', $unique_id)->where('lang_id', '=', $this->lang_id)->where('type', '=', 'faculty')->where('status', '=', 1)->first();
        $data['program_cat'] = AffiliatedProgramCategory::all();
        foreach ($data['program_cat'] as $row) {
            $data['cat_program_' . $row->slug] = $this->dm_post->categoryProgram($row->id, $this->lang_id, $unique_id);
            $data['cat_slug' . $row->slug] = $row->id;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['constituent'] = AffiliatedCollage::where('lang_id', '=', $this->lang_id)->where('status', '=', 1)->where('campus_type', '=', "constituent")->where('affiliated_id', '=', $unique_id)->get();
        $data['affiliated'] = AffiliatedCollage::where('lang_id', '=', $this->lang_id)->where('status', '=', 1)->where('campus_type', '=', "affiliated")->where('affiliated_id', '=', $unique_id)->get();
        $data['staff'] = AffiliatedStaff::where('lang_id', '=', $this->lang_id)->where('affiliated_id', '=', $unique_id)->where('status', '=', 1)->get();
        $data['slider'] = AffiliatedBanner::where('affiliated_id', '=', $unique_id)->where('lang_id', '=', $this->lang_id)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.page'), compact('data'));
    }

    public function showFeaturedMember()
    {
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['featured_staff'] = Staff::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->orderBy('order')->get();
        // $lang_id = $this->lang_id;
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.featured'), compact('data'));
    }


    public function getLinks()
    {
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['links'] = CentralDepartment::where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->paginate(18);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.link'), compact('data'));
    }

    /** Journal  */


    public function showCategoryJournal($id)
    {
        $this->tracker;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::categoryBasedJournal($id, $this->lang_id);
        $data['cat'] = $this->dm_post::getJournalCategory($id);
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.journalCategory'), compact('data'));
    }

    public function showJournal($unique_id)
    {
        $this->tracker;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['row'] = $this->dm_post::getSingleJournal($unique_id, $this->lang_id);
        $data['file'] = $this->dm_post::getJournalFile($unique_id);
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();

        return view(parent::loadView($this->view_path . '.single'), compact('data'));
    }

    public function downloadJournalFile($id)
    {
        $file = $this->dm_post::downloadJournalFile($id);
        return $file;
    }

    public function showBranch($id)
    {
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['lang'] = $this->lang_id;

        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['rows'] = $this->dm_post::branchBasedPost($id, $this->lang_id);
        $data['cat'] = $this->dm_post::getBranchs($this->lang_id, $id);
        $data['branch'] = Branch::where('status', '=', 1)->orderBy('order')->get();
        $data['branchs'] = $this->dm_post::getSingleBranch($id);
        $lang_id = $this->lang_id;
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.branch'), compact('data'));
    }
    public function showCate($category_id)
    {
        $this->tracker;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::branchBasedPost($category_id, $this->lang_id);
        $data['menu_cat'] = $this->dm_post::muMenu($this->lang_id, $category_id);
        $data['cat'] = $this->dm_post::getBranchs($this->lang_id, $category_id);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 6);
        //        dd($data['category']);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }
        foreach ($data['category'] as $row) {
            //dd($row);
            $data['cat_post_' . $row->name] = $this->dm_post::categoryPost($row->id, $this->lang_id, '4');
            $data['cat_' . $row->name] = $row->id;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.category'), compact('data', 'cat_post', 'cat'));
    }


    //to show post category with post archive
    public function showTagPost($tag_id)
    {
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $this->tracker;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::tagBasedPost($tag_id, $this->lang_id);
        $data['cat'] = $this->dm_post::getTrending($tag_id);
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        $data['member'] = Staff::where('status', '=', 1)->where('branch_id', '=', 1)->where('lang_id', '=', $this->lang_id)->orderBy('order')->take(9)->get();
        return view(parent::loadView($this->view_path . '.trending'), compact('data'));
    }

    /** Show All Post Collection */
    public function showAllTagPost()
    {
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $this->tracker;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::getAllPosts($this->lang_id);
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->orderBy('id', 'desc')->where('lang_id', '=', $this->lang_id)->take(5)->get();
        return view(parent::loadView($this->view_path . '.trending'), compact('data'));
    }


    public function showAllPageTag()
    {
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $this->tracker;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::getAllPages($this->lang_id);
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->orderBy('id', 'desc')->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.trending'), compact('data'));
    }


    public function showAllTag()
    {
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $this->tracker;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::getTags();
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->orderBy('id', 'desc')->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.trending'), compact('data'));
    }

    // other menu all page dynamic
    public function showOtherPost($other_menu_id)
    {
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $this->tracker;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::otherBasedPost($other_menu_id, $this->lang_id);
        $data['cat'] = $this->dm_post::getOtherMenu($other_menu_id);
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        $data['member'] = Staff::where('status', '=', 1)->where('branch_id', '=', 1)->where('lang_id', '=', $this->lang_id)->orderBy('order')->take(9)->get();
        return view(parent::loadView($this->view_path . '.rajniti'), compact('data'));
    }

    /** Show All Post Collection */
    public function showAllOtherPost()
    {
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $this->tracker;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::getAllPosts($this->lang_id);
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->orderBy('id', 'desc')->where('lang_id', '=', $this->lang_id)->take(5)->get();
        return view(parent::loadView($this->view_path . '.rajniti'), compact('data'));
    }


    public function showAllPageOther()
    {
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $this->tracker;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::getAllPages($this->lang_id);
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->orderBy('id', 'desc')->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.rajniti'), compact('data'));
    }


    public function showAllOther()
    {
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $this->tracker;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::getOthers();
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->orderBy('id', 'desc')->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.rajniti'), compact('data'));
    }
    public function showOtherSinglePost($post_unique_id)
    {
        //

        $this->tracker;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['row'] = $this->dm_post::getSingleOtherPost($post_unique_id, $this->lang_id);
        $data['file'] = $this->dm_post::getFile($post_unique_id);
        $data['image'] = $this->dm_post::getImage($post_unique_id);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['rows'] = $this->dm_post::otherBasedPost($data['row']->other_menu_id, $this->lang_id);
        $data['cat'] = $this->dm_post::getOtherMenu($data['row']->other_menu_id);

        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 6);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }

        foreach ($data['category'] as $row) {
            //dd($row);
            $data['cat_post_' . $row->name] = $this->dm_post::categoryPost($row->id, $this->lang_id, '4');
            $data['cat_' . $row->name] = $row->id;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.singleotherpost'), compact('data', 'cat_post', 'cat'));
    }

    public function showTagSinglePost($post_unique_id)
    {
        //

        $this->tracker;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['row'] = $this->dm_post::getSingleTagPost($post_unique_id, $this->lang_id);
        $data['file'] = $this->dm_post::getFile($post_unique_id);
        $data['image'] = $this->dm_post::getImage($post_unique_id);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['rows'] = $this->dm_post::otherBasedPost($data['row']->other_menu_id, $this->lang_id);
        $data['cat'] = $this->dm_post::getOtherMenu($data['row']->other_menu_id);

        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 6);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }

        foreach ($data['category'] as $row) {
            //dd($row);
            $data['cat_post_' . $row->name] = $this->dm_post::categoryPost($row->id, $this->lang_id, '4');
            $data['cat_' . $row->name] = $row->id;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.singletagpost'), compact('data', 'cat_post', 'cat'));
    }

    public function showBranchPost($staff_unique_id)
    {
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['lang'] = $this->lang_id;

        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        // $data['rows'] = $this->dm_post::branchBasedPost($id, $this->lang_id);
        // $data['cat'] = $this->dm_post::getBranchs($this->lang_id, $id);
        $data['branch'] = Branch::where('status', '=', 1)->orderBy('order')->get();
        // $data['branchs'] = $this->dm_post::getSingleBranch($id);
        $lang_id = $this->lang_id;
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['row'] = $this->dm_post::getSingleBranchPost($staff_unique_id, $this->lang_id);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.single'), compact('data'));
    }

    // Method to retrieve districts based on province ID

    public function showPradesh()
    {
        $this->tracker;
        $data['provinces'] = Provinces::all();
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::getAllPosts($this->lang_id);
        $data['province'] = ProvincePost::where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(15)->get();
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);

        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.pradesh'), compact('data'));
    }

    public function showJilla(Request $request)
    {
        $this->tracker;
        // Fetch the selected province based on the passed province ID
        $province_id = $request->input('province_id');
        $province = Provinces::findOrFail($province_id);

        // Fetch the districts related to the selected province
        $districts = Districts::where('province_id', $province_id)->get();
        $data['provinces'] = Provinces::all();
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::getAllPosts($this->lang_id);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();


        // Add province and districts to the data passed to the view
        $data['province'] = $province;
        $data['districts'] = $districts;

        $data['post_province'] = ProvincePost::with(['districts.posts'])->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)
            ->where('province_id', $province_id)->get();
        //  dd($data['post_province']);
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        return view(parent::loadView($this->view_path . '.jilla'), compact('data'));
    }


    public function showSingleDistrict($district_id)
    {
        // Fetch the selected district
        $district = Districts::findOrFail($district_id);
        // Fetch the province related to this district
        $province = Provinces::find($district->province_id);
        // Fetch common data for the view
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['rows'] = $this->dm_post::getAllPosts($this->lang_id);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();

        // Pass the district and province to the view
        $data['district'] = $district;
        $data['province'] = $province;

        $data['post_province'] = ProvincePost::with(['getdistricts.posts'])->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)
            ->where('district_id', $district_id)->get();
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        return view(parent::loadView($this->view_path . '.singlejilla'), compact('data'));
    }

    public function showProvinceSinglePost($post_unique_id)
    {
        //

        $this->tracker;
        $data['common'] = Common::where('lang_id', '=', $this->lang_id)->first();
        $data['lang'] = $this->lang_id;
        $data['footer_imp_link'] = Link::where('status', '=', 1)->where('featured', '=', 1)->where('lang_id', '=', $this->lang_id)->get();
        $data['menu'] = Menu::tree($this->lang_id);
        $data['tag'] = Tag::tree();
        $data['others'] = OtherMenus::tree();
        $data['row'] = $this->dm_post::getSingleProvincePost($post_unique_id, $this->lang_id);
        $data['file'] = $this->dm_post::getFile($post_unique_id);
        $data['image'] = $this->dm_post::getImage($post_unique_id);
        $data['recent_post'] = DB::table('posts')->where('type', '=', 'post')->where('status', '=', 1)->where('lang_id', '=', $this->lang_id)->take(5)->get();
        $data['rows'] = $this->dm_post::otherBasedPost($data['row']->other_menu_id, $this->lang_id);
        $data['cat'] = $this->dm_post::getOtherMenu($data['row']->other_menu_id);

        $k = 0;
        $data['category'] = $this->dm_post::getCategoryList($this->lang_id, 6);
        foreach ($data['category'] as $row) {
            if ($k == 0) {
                $j = 4;
            } elseif ($k == 2) {
                $j = 3;
            } else {
                $j = 5;
            }
            $cat_post[$k] = $this->dm_post::categoryPost($row->id, $this->lang_id, $j);
            $cat[$k] = $row->id;
            $k++;
        }

        foreach ($data['category'] as $row) {
            //dd($row);
            $data['cat_post_' . $row->name] = $this->dm_post::categoryPost($row->id, $this->lang_id, '4');
            $data['cat_' . $row->name] = $row->id;
        }
        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);
        $data['user'] = User::where('status', '=', 1)->where('role_super', '=', 1)->first();
        return view(parent::loadView($this->view_path . '.singleprovince'), compact('data', 'cat_post', 'cat'));
    }

    public function storeReview(Request $request)
    {
        
       
        $request->validate([
            'comment' => 'required|string|max:500',  // Ensures a comment is provided
            'post_id' => 'required|integer',  // Assumes post_id is required and integer
            'user_id' => 'required|integer',  // Assumes post_id is required and integer
        ]);
       
        // PostReview::create([
        //     'user_id' =>$request->user_id,  // Get the current logged-in user ID
        //     'post_id' => $request->post_id,  // Assumes a post_id is being sent
        //     'comment' => $request->comment,  // Comment from the form
        // ]);
        $save = new PostReview();
        $save->user_id = $request->user_id;
        $save->post_id = $request->post_id;
        $save->comment = $request->comment;
        $save->save();
        $notification = array(
            'message' => 'Message sent successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
