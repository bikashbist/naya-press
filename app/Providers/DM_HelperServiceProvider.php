<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DM_Traits\HasPermission;

class DM_HelperServiceProvider extends ServiceProvider
{
    use HasPermission;
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require base_path().'/app/DM_Helpers/DM_form_library.php';
        require base_path().'/app/DM_Helpers/DM_common_library.php';
        require base_path().'/app/DM_Helpers/DM_general_library.php';
        require base_path().'/app/DM_Helpers/DM_db_backup_library.php';
        require base_path().'/app/DM_Libraries/Spyc.php';
    }
}
