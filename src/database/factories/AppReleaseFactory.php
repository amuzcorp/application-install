<?php

namespace AmuzThemes\ApplicationInstall\Database\Factories;

use AmuzThemes\ApplicationInstall\Models\AppRelease;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AppReleaseFactory extends Factory
{
    protected $model = AppRelease::class;
    public function definition(): array
    {
        $os = Arr::random(['ios','aos']);
        $version = fake()->semver();

        return [
            'is_public' => fake()->boolean(),
            'os_type' => $os,
            'min_os_version' => $os == 'ios' ? '16' : '13',
            'version_code' => $version,
            'build_number' => AppRelease::query()->where('os_type',$os)->max('build_number') + 1,
            'install_url' => $os == 'ios' ? '/applications/ios/'.Str::replace(".","_",$version).'/info.plist' : '/applications/aos/'.Str::snake($version).'/app.apk',
            'status' => Arr::random(['stable','beta','dev','arch']),
            'publish_at' => Carbon::now()
        ];
    }
}
