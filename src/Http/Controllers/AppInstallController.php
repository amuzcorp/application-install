<?php

namespace AmuzThemes\ApplicationInstall\Http\Controllers;

use AmuzThemes\ApplicationInstall\Models\AppRelease;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class AppInstallController extends Controller
{
    public function __construct()
    {
        Inertia::share('frontConfig',config('application-install.frontend'));
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
