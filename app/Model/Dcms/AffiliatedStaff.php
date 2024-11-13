<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Illuminate\Http\Request;
use DateTime;
use App\Model\Dcms\Branch;
use Auth;

class AffiliatedStaff extends DM_BaseModel
{
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    // protected $table = 'staff';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'affiliated_staff';
    protected $prefix_path_image = '/upload_file/images/affiliated_staff/';

   /**
     * Relationship between branch and staff
     */
    // public function branch() {
    //     return $this->belongsTo(Branch::class, 'branch_id', 'id' );
    // }

    public function __construct() {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function storeData(Request $request, $rows, $image, $affiliated_id, $status, $featured, $level, $phone, $email, $type){
        $unique_id = uniqid(Auth::user()->id.'_');
        // for thumbnail
        if($request->hasFile('image')){
            $staff_image = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image');
        }
        else {
            $staff_image = null;
        }

        foreach($rows as $row) {
            $data[] =[
                'lang_id' => $row['lang_id'],
                'unique_id' => $unique_id,
                'name' => $row['name'],
                'image' => $staff_image,
                'description' => $row['description'],
                'designation' => $row['designation'],
                'phone' => $phone,
                'email' => $email,
                'status' => $status,
                'featured' => $featured,
                'level' => $level,
                'affiliated_id' => $affiliated_id,
                'type' => $type,
                // 'created_at' => new DateTime(),
            ];

        }

        if(AffiliatedStaff::insert($data)){
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Update the branch office
     */
    public function updateData(Request $request, $unique_id, $rows, $image, $affiliated_id, $status, $featured, $level,  $phone, $email, $type) {
        // $unique_id = uniqid(Auth::user()->id.'_');
        foreach( $rows as $row) {
            if(isset($row['id'])){
                $staff = AffiliatedStaff::findOrFail($row['id']);
            }else{
                $staff = new AffiliatedStaff;
                $staff->unique_id = $unique_id;
            }
            $staff->lang_id = $row['lang_id'];
            $staff->name = $row['name'];
            if($request->hasFile('image')){
                $staff->image = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image');
            }
            $staff->description = $row['description'];
            $staff->designation = $row['designation'];
            $staff->level = $level;
            $staff->phone = $phone;
            $staff->email = $email;
            $staff->affiliated_id = $affiliated_id;
            $staff->status = $status;
            $staff->featured = $featured;
            $staff->type = $type;
            $staff->save();
        }
        if($staff->save()) {
            return true;
        }else {
            return false;
        }

    }
}
