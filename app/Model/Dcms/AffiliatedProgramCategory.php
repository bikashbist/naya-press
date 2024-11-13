<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;

class AffiliatedProgramCategory extends DM_BaseModel
{
     /** Category Tree */
     public function categoryTree() {
        $data['rows'] = AffiliatedProgramCategory::all();
        $ref = [];
        $items = [];
        foreach($data['rows'] as $row){
            $thisRef = &$ref[$row->id];
            $thisRef['name'] = $row->name;
            $thisRef['parent_id'] = $row->parent_id;
            $thisRef['id'] = $row->id;
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
    public function buildCategory($items, $class = 'dd-list') {
        $html = "<ol class=\"".$class."\" id=\"menu-id\">";
        foreach($items as $key=>$value) {
            $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content"><span id="label_show'.$value['id'].'">'.$value['name'].'</span> 
                            <span class="span-right">
                                
                                &nbsp;&nbsp; 
                                <a class="btn btn-warning" id="'.$value['id'].'" label="'.$value['name'].'" href="\dashboard/institute/category/'. $value['id'].'/edit" ><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger del-button" id="'.$value['id'].'" ><i class="fa fa-trash-o"></i></a>
                            </span> 
                        </div>';
            if(array_key_exists('child',$value)) {
                $html .= self::buildCategory($value['child'],'child');
            }
                $html .= "</li>";
        }
        $html .= "</ol>";
        return $html;
    }

    // Getter for the HTML menu builder | Admin Panel
	public function getHTML($items)
	{
		return $this->buildCategory($items);
	}
}
