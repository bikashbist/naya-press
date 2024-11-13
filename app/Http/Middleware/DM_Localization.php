<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use App\Model\Dcms\Language;
use App\Model\Dcms\Setting;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Redirect;

class DM_Localization
{
    public function __construct(Application $app, Redirector $redirector, Language $lang, Request $request, Setting $setting) {
        $this->app = $app;
        $this->request = $request;
        $this->lang = $lang;
        $this->redirector = $redirector;
        $this->setting = $setting;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);
        $lang_code = $this->lang::where('status', '=', 1)->pluck('name','code')->all();
        if(empty($lang_code)){
            dd('YOU MUST INSERT THE LANGUAGE FROM DATABASE');
            // $lang_code = $this->app->config->get('app.locales');
        }

        $default_lang_code = $this->setting::pluck('language')->first();
        if(!isset($default_lang_code)){
            $default_lang_code = $this->app->config->get('app.fallback_locale');    
        }
       
        if(in_array($locale, $this->app->config->get('app.skip_locales') )){
            return $next($request);
        }
        else {
            if(! array_key_exists($locale, $lang_code)){
                $segments = $request->segments();
                array_unshift($segments, $default_lang_code);
                // $segments[0] = $this->app->config->get('app.fallback_locale'); //THIS COMMENTED CODE DOES NOT WORK
                return $this->redirector->to(implode('/', $segments));
            }
        }
        $this->app->setLocale($locale);
        return $next($request);
    }
}
