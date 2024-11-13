<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use DB;
use Illuminate\Http\Request;

class OtherMenus extends DM_BaseModel
{
    protected $table = 'other_menus';

    public function otherposts() {
        return $this->hasMany(OtherMenuPost::class);
    }

    /** Navigation for Frontend */
    public static function tree() {
        $data['rows'] = DB::table('other_menus')->where('status', '=', 1)->orderBy('order')->get();
        $ref = [];
        $items = [];
        foreach($data['rows'] as $row){
            $thisRef = &$ref[$row->id];
            $thisRef['name'] = $row->name;
            $thisRef['order'] = $row->order;
            $thisRef['parent_id'] = $row->parent_id;
            $thisRef['id'] = $row->id;
            $thisRef['url'] = $row->url;
            if($row->parent_id == 0) {
                $items[$row->id] = &$thisRef;
            } else {
                $ref[$row->parent_id]['child'][$row->id] = &$thisRef;
            } 
        }
        return $items;
    }

    /** Dashboard Tag Tree */
    public function otherTree() {
        $data['rows'] = OtherMenus::orderBy('order')->get();
        // var_dump($data['rows']);
        $ref = [];
        $items = [];
        foreach($data['rows'] as $row){
            $thisRef = &$ref[$row->id];
            $thisRef['name'] = $row->name;
            $thisRef['parent_id'] = $row->parent_id;
            $thisRef['status'] = $row->status;
            $thisRef['id'] = $row->id;
            if($row->parent_id == 0) {
                $items[$row->id] = &$thisRef;
            } else {
                $ref[$row->parent_id]['child'][$row->id] = &$thisRef;
            } 
        }
        // dd($items);
        return $items;
    }

     /**
     * Build Tag | Admin Panel
     */
    public function buildOther ($items, $class = 'dd-list') {
        // dd($items);
        $html = "<ol class=\"".$class."\" >";
        foreach($items as $key=>$value) {
            $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content"><span id="label_show'.$value['id'].'">'.$value['name'].'</span> 
                            <span class="span-right">
                                <span id="link_show'.$value['id'].'">Status:'.$value['status'].'</span>
                                &nbsp;&nbsp; 
                                <a class="btn btn-warning" id="'.$value['id'].'" label="'.$value['name'].'" href="\dashboard/other_menus/'. $value['id'].'/edit" ><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger del-button" id="'.$value['id'].'" ><i class="fa fa-trash-o"></i></a>
                            </span> 
                        </div>';
            if(array_key_exists('child',$value)) {
                $html .= self::buildOther($value['child'],'dd-list');
            }
                $html .= "</li>";
        }
        $html .= "</ol>";
        // dd($html);
        return $html;
    }

    // Getter for the HTML tag builder | Admin Panel
	public function getHTML($items)
	{
		return $this->buildOther($items);
	}

}

