<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        if (request('change-language'))
//        {
//            if (! in_array(request('change-language'), config('language.available_languages')))
//            {
//                abort(400,'something wrong.');
//            }
//        }

        if (request('change-language'))
        {
            session()->put('lan', request('change-language'));
            $language = request('change-language');
        } elseif (session('lan'))
        {
            $language = session('lan');
        } elseif (config('language.primary_language'))
        {
            $language = config('language.primary_language');
        }

        if (isset($language))
        {
            if ($language == 'en')
            {
                session()->put('lan-title', 'English');
                session()->put('lan-flag', 'us.jpg');
            } elseif ($language == 'bn')
            {
                session()->put('lan-title', 'Bangla');
                session()->put('lan-flag', 'bd.jpg');
            }
            app()->setLocale($language);
        }
        return $next($request);
    }
}
