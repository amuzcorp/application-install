<?php

namespace AmuzThemes\ApplicationInstall\Http\Controllers;

use AmuzThemes\ApplicationInstall\Models\AppRelease;
use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class AppInstallController extends Controller
{
    private array $targetStatuses = [
        'stable'
    ];

    public function __construct(Request $request)
    {
        $activeStatuses = $request->get('active_statuses');
        if(!empty($activeStatuses)){
            $activeStatuses = explode(",",$activeStatuses);
            if(count($activeStatuses) > 0) $this->targetStatuses = $activeStatuses;
        }

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

    public function releases(Request $request, $releaseId = null): InertiaResponse
    {
        $releases = $this->getReleaseQuery()
            ->paginate(10);

        if($releaseId !== null){
            $release = $this->getReleaseQuery()->where('id',$releaseId)->first();
        }else{
            $release = $this->getReleaseQuery()->first();
        }

        return Inertia::render('Releases',[
            'targetStatuses' => $this->targetStatuses,
            'currentRelease' => $release,
            'releases' => $releases,
            'latestVersions' => $this->getLTS()
        ]);
    }

    private function download(Request $request, $osType,$releaseId = null): InertiaResponse
    {
        $releases = $this->getReleaseQuery()
            ->where('os_type',$osType)
            ->paginate(10);

        if($releaseId !== null){
            $release = $this->getReleaseQuery()
                ->where('os_type',$osType)
                ->where('id',$releaseId)->first();
        }else{
            $release = $this->getReleaseQuery()
                ->where('os_type',$osType)
                ->first();
        }

        return Inertia::render('OS/' . $osType,[
            'osType' => $osType,
            'targetStatuses' => $this->targetStatuses,
            'currentRelease' => $release,
            'releases' => $releases,
            'latestVersions' => $this->getLTS()
        ]);
    }

    public function ios(Request $request, $releaseId = null): InertiaResponse
    {
        return $this->download($request,'ios',$releaseId);
    }
    public function android(Request $request, $releaseId = null): InertiaResponse
    {
        return $this->download($request,'aos',$releaseId);
    }

    private function getReleaseQuery(): Builder
    {
        return AppRelease::query()
            ->where('is_public',true)
            ->where('publish_at','<',Carbon::now()->format('Y-m-d H:i:s'))
            ->whereIn('status',$this->targetStatuses)
            ->orderBy('build_number','DESC');
    }

    private function getLTS(): array
    {
        return [
            'ios' => $this->getReleaseQuery()->where('os_type','ios')->first(),
            'aos' => $this->getReleaseQuery()->where('os_type','aos')->first(),
        ];
    }
}
