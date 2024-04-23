<?php
namespace AmuzThemes\ApplicationInstall\Database\Seeders;

use AmuzThemes\ApplicationInstall\Models\AppRelease;
use Illuminate\Database\Seeder;

class AppReleaseSeeder extends Seeder
{
    /**
     * @TEST Command
     * php artisan db:seed --class="AmuzThemes\ApplicationInstall\Database\Seeders\\AppReleaseSeeder"
     */
    public function run(): void
    {
        AppRelease::factory()->count(50)->create();
    }
}
