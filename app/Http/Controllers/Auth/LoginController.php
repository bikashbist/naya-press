<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\Dcms\Eloquent\DM_Post;
use App\Model\Dcms\Tracker;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';
    public function redirectTo()
    {
        // return '/admin/dashboard';
        // User Type
        $type = Auth::user()->role;
        // Check user Type
        switch ($type) {
            case '1':
                return '/dashboard';
                break;
            case '0':
                return '/';
                break;
            default:
                return '';
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Tracker $tracker, DM_Post $dm_post)
    {
        $this->middleware('guest')->except('logout');
        $this->tracker = $tracker::hit();
        $this->lang_id = $dm_post::setLanguage();

    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $this->tracker;
        return view('dcms.auth.login');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => new DateTime(),
            'last_login_ip' => $request->getClientIp()
        ]);
    }

}
