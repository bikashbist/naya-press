<?php

namespace App\Model\Dcms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Video extends Model
{

    public function storeData($rows, $featured, $status, $video_url)
    {
        $video_unique_id = uniqid(Auth::user()->id . '_');

        $video_url = $video_url;
        function getYoutubeIdFromUrl($video_url)
        {
            preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)#", $video_url, $matches);
            if ($matches) {
                return $matches[2];
            }
        }

        foreach ($rows as $row) {

            $videos[] = [

                'video_unique_id' => $video_unique_id,
                'lang_id' => $row['lang_id'],
                'video_title' => $row['video_title'],
                // 'location' => $row['location'],
                'video_url'  => $video_url,
                'video_id' => getYoutubeIdFromUrl($video_url),
                'status' => $status,
                'featured' => $featured,
            ];
        }
        if (Video::insert($videos)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateData($video_unique_id, $rows, $status, $featured,  $video_url)
    {

        $video_unique_id = uniqid(Auth::user()->id . '_');

        $video_url = $video_url;
        function getYoutubeIdFromUrll($video_url)
        {
            preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)#", $video_url, $matches);
            if ($matches) {
                return $matches[2];
            }
        }

        foreach ($rows as $row) {
            if (isset($row['id'])) {
                $video = Video::findOrFail($row['id']);
            } else {
                $video = new Video();
                $video->link_unique_id = $video_unique_id;
            }
            $video->lang_id = $row['lang_id'];
            $video->video_title = $row['video_title'];
            // $link->location = $row['location'];
            $video->video_url = $video_url;
            $video->video_id = getYoutubeIdFromUrll($video_url);

            $video->status = $status;
            $video->featured = $featured;

            $video->save();
        }
        if ($video->save()) {
            return true;
        } else {
            return false;
        }
    }
}
