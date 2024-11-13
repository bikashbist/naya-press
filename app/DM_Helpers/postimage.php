<?php
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\PostImage;

if(!function_exists('get_post_image')){
    function get_post_image($post_unique_id) {
     $image =  PostImage::where('post_unique_id',$post_unique_id)->first();
     if($image)
     {
        return $image->images;
     }else{
        return null;
     }
    } 
}
?>