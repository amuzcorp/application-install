<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('app_releases', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string("os_type")->index();
            $table->string("min_os_version")->index();

            $table->string("version_code")->nullable();
            $table->integer("build_number")->nullable();

            $table->string('install_url')->nullable();

            $table->longText("content")->nullable();

            $table->integer('sort_order');

            $table->datetime('publish_at')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_releases');
    }
};
