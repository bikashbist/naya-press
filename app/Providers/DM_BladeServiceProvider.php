<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use DB;

class DM_BladeServiceProvider extends ServiceProvider
{
    // use HasPermission;
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('env', function ($environment) {
            
        });
        Blade::if('permission', function ($permission) {
            $permission_slug = [];
            $assign_permission = $this->joinRolePermission();
            foreach($assign_permission as $row) {
                array_push($permission_slug, $row->slug);
            }
            $slug = array_combine($permission_slug, $permission_slug);
            if(Auth::user()->role_super == 1) {
                return true;
            }
            if(array_key_exists($permission, $slug)){
               return true;
            }
            else {
                return false;
            }
                

        });

        Blade::directive('permissionDirective', function () {
            return "<?php } ?>";
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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
