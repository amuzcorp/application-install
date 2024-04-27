<?php

namespace AmuzThemes\ApplicationInstall\Http\Controllers;

use AmuzThemes\ApplicationInstall\Models\AppRelease;
use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class AppInstallController extends Controller
{
    public function __construct()
    {
        Inertia::share('frontConfig',config('application-install.frontend'));
        $this->middleware(function(Request $request, Closure $next){
            $currentLocale = app()->getLocale();
            $lang = collect();
            $targetPath = resource_path(sprintf('lang/%s.json',$currentLocale));
            if(file_exists($targetPath)) $lang = $lang->merge(json_decode(file_get_contents($targetPath, true)));
            foreach(amuz_packages() as $packageName => $packagePath){
                $targetPath = package_lang_path($packageName,sprintf('%s.json',$currentLocale));
                if(file_exists($targetPath)) $lang = $lang->merge(json_decode(file_get_contents($targetPath, true)));
            }

            $targetPath = theme_path('amuz/application-install') . sprintf('/resources/lang/%s.json',$currentLocale);
            if(file_exists($targetPath)) $lang = $lang->merge(json_decode(file_get_contents($targetPath, true)));

            Inertia::share('language',$lang->toArray());
            return $next($request);
        });
    }

    public function index(): InertiaResponse
    {
        return Inertia::render('Index');
    }

    public function releases(): InertiaResponse
    {
        $releases = AppRelease::query()
            ->orderBy('created_at','DESC')
            ->paginate(15);
        return Inertia::render('Releases',[
            'releases' => $releases
        ]);
    }

    public function ios(): InertiaResponse
    {
        return Inertia::render('iOS');
    }
    public function android(): InertiaResponse
    {
        return Inertia::render('AOS');
    }
}
