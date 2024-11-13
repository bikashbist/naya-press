<?php

namespace App\Model\Dcms;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
      /** Dashboard Menu Tree */
      public function permissionTree() {
        $data['rows'] = Permission::orderBy('order')->get();
        // var_dump($data['rows']);
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
        // dd($items);
        return $items;
    }

      /**
     * Build Menu | Admin Panel
     */
    public function buildPermission ($items, $class = 'dd-list') {
        // dd($items);
        $html = "<ol class=\"".$class."\" >";
        foreach($items as $key=>$value) {
            $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content"><span id="label_show'.$value['id'].'">'.$value['name'].'</span> 
                            <span class="span-right">
                                
                            </span> 
                        </div>';
            if(array_key_exists('child',$value)) {
                $html .= self::buildPermission($value['child'],'dd-list');
            }
                $html .= "</li>";
        }
        $html .= "</ol>";
        // dd($html);
        return $html;
    }

    // Getter for the HTML menu builder | Admin Panel
	public function getHTML($items)
	{
		return $this->buildPermission($items);
	}

}
