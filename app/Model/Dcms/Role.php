<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Illuminate\Support\Str;

class Role extends DM_BaseModel
{
    public function storeData($name, $status) {
        $role = new Role;
        $role->name = $name;
        $role->slug = Str::slug($name);
        $role->status = $status;
        $role->save();
        if($role->save()) {
            return true;
        }
        else {
            return false;
        }

    }

    public function updateData($id, $name, $status) {
        $role = Role::findOrFail($id);
        $role->name = $name;
        $role->slug = Str::slug($name);
        $role->status = $status;
        $role->save();
        if($role->save()) {
            return true;
        }
        else {
            return false;
        }
    }

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
    //
    public function users() {
        return $this->hasMany(User::class);
    }
}
