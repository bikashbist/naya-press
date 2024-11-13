<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Illuminate\Http\Request;
use DB;
use App\Model\Dcms\Gallery;


class Album extends DM_BaseModel
{
    protected $guarded = [''];
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'albums';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'album';
    protected $prefix_path_image = '/upload_file/images/album/';
    protected $prefix_path_file = '/upload_file/files/post/';

    public function __construct() {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function photos() {
        return $this->hasMany(Gallery::class, 'album_id', 'id');
    }

    public function joinAlbum($lang_id) {
        $album = DB::table('albums')
                    ->join('albums_name', 'albums.id', '=', 'albums_name.album_id')
                    ->select('albums.*', 'albums_name.title', 'albums_name.lang_id', 'albums_name.description')
                    ->where('albums_name.lang_id', '=', $lang_id)
                    ->get();
        return $album;
    }
    /**
     * store album to the database
     */
    public function storeData(Request $request,$name, $rows, $image, $status, $order) {
        if($request->hasFile('image')){
            $cover_image = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image');  
        }
        else {
            $cover_image = null;
        }
        $row = new Album;
        $row->name = $name;
        $row->order = $order;
        $row->status = $status;
        $row->cover_image = $cover_image;
        $row->save();
        $album_id = $row->id;
        foreach($rows as $row) {
            DB::table('albums_name')->insert(array([
                'album_id' => $album_id,
                'lang_id' => $row['lang_id'],
                'title' => $row['name'],
            ]));
        }
        return true;
    }

    /**
     * update album to the database
     */
    public function updateData(Request $request, $id, $name, $rows, $image, $status, $order) {
        $row = Album::findOrFail($id);
        $row->name = $name;
        $row->order = $order;
        $row->status = $status;
        if($request->hasFile('image')){
            $row->cover_image = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image', 340, 346);  
        }
        $row->save();
        $album_id = $row->id;
        foreach($rows as $row) {
            DB::table('albums_name')->where('album_id', $id)->where('lang_id', $row['lang_id'])->update([
                'album_id' => $album_id,
                'lang_id' => $row['lang_id'],
                'title' => $row['name'],
            ]);
        }
        return true;
    }
}
