<?php

namespace App\DM_Traits;

use App\Model\Dcms\Eloquent\DM_Post;
use Auth;
use DB;

trait HasPermission
{
    public function checkPermission($permission) : bool {
        // dd($permission);
        $permission_slug = [];
        $assign_permission = $this->joinRolePermission();
        foreach($assign_permission as $row) {
            array_push($permission_slug, $row->slug);
        }
        $slug = array_combine($permission_slug, $permission_slug);
        if(array_key_exists($permission, $slug)){
            return true;
        }
        else {
            return false;
        }
    }

     //For Permission
     public function joinRolePermission() {
        $permission_role = DB::table('permission_role')
        ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
        ->where('permission_role.role_id', '=', Auth::user()->role_id)
        ->select( 'permissions.slug')
        ->get();
        return $permission_role;
    }
}