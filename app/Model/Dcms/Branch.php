<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Auth;
use App\Model\Dcms\Staff;
use DB;
use App\Model\Dcms\Eloquent\DM_Post;

class Branch extends DM_BaseModel
{
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'branches';

    public function branchParent() {
        return $this->belongsTo(Branch::class, 'parent_id', 'id' );
    }
    /**
     * relationship between branches table
     */
    public function branchChildren() {
        return $this->hasMany(Branch::class, 'parent_id', 'id');
    }
    /**
     * Relationship between branch and staff
     */
    public function staff() {
        $lang_id = DM_Post::setLanguage();
        return $this->hasMany(Staff::class, 'branch_id', 'id')->where('status', '=', 1)->where('lang_id', '=', $lang_id)->orderBy('order');
    }
    /**
     * store the data in office
     */
    public static function storeData($name, $rows, $status) {
        $data = new Branch;
        $data->name = $name;
        $data->status = $status;
        $data->save();
        foreach( $rows as $row) {
            DB::table('branches_name')->insert(array([
                'branch_id' => $data->id,
                'lang_id' => $row['lang_id'],
                'name' => $row['name'],
            ]));
        }
        return true;
    }
    /**
     * Update the branch office
     */
    public static function updateData($id, $name, $rows, $status) {
        $branch = Branch::findOrFail($id);
        $branch->name = $name;
        $branch->status = $status;
        foreach($rows as $row) {
            $branch_name =  DB::table('branches_name')->where('branch_id', $id)->where('lang_id', $row['lang_id'])->first();
            if(isset($branch_name)){
                DB::table('branches_name')->where('branch_id', $id)->where('lang_id', $row['lang_id'])->update([
                    'branch_id' => $id,
                    'lang_id' => $row['lang_id'],
                    'name' => $row['name'],
                ]);
            }else {
                DB::table('branches_name')->where('branch_id', $id)->where('lang_id', $row['lang_id'])->insert([
                    'branch_id' => $id,
                    'lang_id' => $row['lang_id'],
                    'name' => $row['name'],
                ]);
            }
        }
        if($branch->save()) {
            return true;
        }else {
            return false;
        }
    }

     /** Category Tree */
     public static function branchTree() {
        $data['rows'] = Branch::orderBy('order')->get();
        $ref = [];
        $items = [];
        foreach($data['rows'] as $row){
            $thisRef = &$ref[$row->id];
            $thisRef['name'] = $row->name;
            $thisRef['parent_id'] = $row->parent_id;
            $thisRef['status'] = $row->status;
            $thisRef['id'] = $row->id;
            if(isset($row->staff))
            {
                $thisRef['staff'] = $row->staff;
            }
            if($row->parent_id == 0) {
                $items[$row->id] = &$thisRef;
            } else {
                $ref[$row->parent_id]['child'][$row->id] = &$thisRef;
            }
        }
        return $items;
    }

     /**
     * Build Category | Admin Panel
     */
    public function buildBranch($items, $class = 'dd-list') {
        $html = "<ol class=\"".$class."\" id=\"menu-id\">";
        foreach($items as $key=>$value) {
            $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content"><span id="label_show'.$value['id'].'">'.$value['name'].'</span>
                            <span class="span-right">
                                <span id="link_show'.$value['id'].'">Status:'.$value['status'].'</span>
                                &nbsp;&nbsp;
                                <a class="btn btn-warning" id="'.$value['id'].'" label="'.$value['name'].'" href="\dashboard/branch/'. $value['id'].'/edit" ><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger del-button" id="'.$value['id'].'" ><i class="fa fa-trash-o"></i></a>
                            </span>
                        </div>';
            if(array_key_exists('child',$value)) {
                $html .= self::buildBranch($value['child'],'child');
            }
                $html .= "</li>";
        }
        $html .= "</ol>";
        return $html;
    }

    // Getter for the HTML menu builder | Admin Panel
	public function getHTML($items)
	{
		return $this->buildBranch($items);
	}
}
