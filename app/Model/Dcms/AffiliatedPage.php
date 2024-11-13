<?php

namespace App\Model\Dcms;


use App\Model\Dcms\DM_BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;
use DateTime;
use App\Model\Dcms\AffiliatedFile;
use App\Model\Dcms\Language;
use App\Model\Dcms\Category;
use App\Model\Dcms\Eloquent\DM_Post;
use App\User;


class AffiliatedPage extends DM_BaseModel
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
   protected $table = 'affiliated_pages';

   protected $folder_path_image;
   protected $folder_path_file;
   protected $folder = 'institute';
   protected $prefix_path_image = '/upload_file/images/institute/';
   protected $prefix_path_file = '/upload_file/files/institute/';

   public function __construct() {
       $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
       $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
   }

   public function storeData(Request $request, $user, $rows, $image, $tag, $status, $file_title, $files, $url, $type){
       $unique_id = uniqid(Auth::user()->id.'_');
       // for thumbnail
       if($request->hasFile('image')){
           $post_thumbnail = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image');
       }
       else {
           $post_thumbnail = null;
       }
       $array_file_title = array_filter($file_title);

       // for  multiple files
       if($request->hasFile('files')){
           $post_files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'files');
       }
       else {
           $post_files = null;
       }
       if(isset($post_files) && isset($array_file_title)){
           $min = min(count($array_file_title), count($post_files));
           $array_file = array_map(null, array_slice($array_file_title, 0, $min), array_slice($post_files, 0, $min));
       }
       else {
           $array_file = null;
       }

       foreach($rows as $row) {
           $posts[] =[
               'user_id' => $user,
               'lang_id' => $row['lang_id'],
               'unique_id' => $unique_id,
               'title' => $row['title'],
               'slug' => Str::slug($row['title']),
               'thumbnail' => $post_thumbnail,
               'content' => $row['content'],
            //    'excerpt' => $row['excerpt'],
               'status' => $status,
               'url' => $url,
               'tag' => $tag,
               'type' => $type,
               'created_at' => new DateTime(),
           ];

       }
       if(isset($array_file)){
           foreach($array_file as $file_row)
               AffiliatedFile::create([
                   'unique_id' => $unique_id,
                   'title'=> $file_row[0],
                   'file' => $file_row[1],
               ]);
       }
       if(AffiliatedPage::insert($posts)){
           return true;
       }
       else {
           return false;
       }
   }

   public function updateData(Request $request, $user, $rows, $image, $tag, $status, $file_title, $files, $unique_id, $url, $type){

    if($request->hasFile('image')){
           $post_thumbnail = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image');
       }
       else {
            $post_thumbnail = AffiliatedPage::findOrFail($rows[0]['id'])->thumbnail;
       }
       $array_file_title = array_filter($file_title);
    //    dd('hello');

       // for  multiple files
       if($request->hasFile('files')){
           $post_files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'files');
       }
       else {
           $post_files = null;
       }
       if(isset($post_files) && isset($array_file_title)){
           $min = min(count($array_file_title), count($post_files));
           $array_file = array_map(null, array_slice($array_file_title, 0, $min), array_slice($post_files, 0, $min));
       }
       else {
           $array_file = null;
       }

       foreach($rows as $row) {
           if(isset($row['id'])){
               $post = AffiliatedPage::findOrFail($row['id']);
           }else{
               $post = new AffiliatedPage;
               $post->user_id = Auth::user()->id;
               $post->unique_id = $unique_id;
           }
           $post->lang_id = $row['lang_id'];
           $post->title = $row['title'];
           $post->slug = Str::slug($row['title']);
           $post->thumbnail = $post_thumbnail;
           $post->content = $row['content'];
           // $post->excerpt = $row['excerpt'];
           $post->status = $status;
           $post->tag = $tag;
           $post->url = $url;
           $post->type = $type;
           $post->updated_at = date('Y-m-d');
           $post->save();
       }
       if(isset($array_file)){
            foreach($array_file as $file_row)
                AffiliatedFile::create([
                        'unique_id' => $unique_id,
                        'title'=> $file_row[0],
                        'file' => $file_row[1],
                    ]);
       }
       if($post->save()){
           return true;
       }
       else {
           return false;
       }
   }

   public function language() {
    return $this->belongsTo(Language::class, 'lang_id');
    }

    public function postUser() {
        return $this->belongsTo(User::class, 'user_id');
    }


}
