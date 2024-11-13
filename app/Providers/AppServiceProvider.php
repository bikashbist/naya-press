<?php

namespace App\Providers;
use App\Model\Dcms\Advistement;
use Illuminate\Support\Facades\Schema;
use View;
use Illuminate\Http\Request;
use Session;
use App\Model\Dcms\Common;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Model\Dcms\Eloquent\DM_Post;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Schema::defaultStringLength(191);
        //comment all these while migrating new database
        $all_view['lang'] = DB::table('languages')->where('deleted_at', '=', null)->where('status', '=', 1)->orderBy('sort_order')->get();
        $all_view['setting'] = DB::table('settings')->first();
        ;
        $all_view['common'] = Common::first();
        $all_view['locale'] = $request->segment(1);
        $all_view['view_count'] = DB::table('trackers')->sum('hits');
        $all_view['contact_count'] = DB::table('contacts')->count();
        $all_view['file_count'] = DB::table('files')->count();
        $all_view['photo_count'] = DB::table('galleries')->count();
        $all_view['featured_pages'] = DM_Post::featuredPageList(DM_Post::setLanguage(), 20);

        // Fetch the top 6 ranked advertisements
        $ads = Advistement::where('status', 1)
            ->orderBy('rank', 'asc')
            ->take(7) // Limit the result to 6 advertisements
            ->get();

        // Assign each advertisement to a variable for easier handling in the Blade template
        $data['first_adv'] = $ads->get(0); // First ad (index 0)
        $data['second_adv'] = $ads->get(1); // Second ad (index 1)
        $data['third_adv'] = $ads->get(2); // Third ad (index 2)
        $data['fourth_adv'] = $ads->get(3); // Fourth ad (index 3)
        $data['fifth_adv'] = $ads->get(4); // Fifth ad (index 4)
        $data['sixth_adv'] = $ads->get(5); // Sixth ad (index 5)
        $data['seventh_adv'] = $ads->get(6);

        View()->share(compact('all_view', 'ads' , 'data'));

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
