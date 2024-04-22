<?php

namespace AmuzThemes\ApplicationInstall\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class AppInstallController extends Controller
{
    public function index(): InertiaResponse
    {
        return Inertia::render('AppInstall/Index');
    }
    public function ios(): InertiaResponse
    {
        return Inertia::render('AppInstall/iOS');
    }
    public function android(): InertiaResponse
    {
        return Inertia::render('AppInstall/AOS');
    }
}
