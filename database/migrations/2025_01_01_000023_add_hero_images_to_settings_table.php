<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('hero_home_image')->nullable()->after('copyright');
            $table->string('hero_about_image')->nullable()->after('hero_home_image');
            $table->string('hero_download_image')->nullable()->after('hero_about_image');
            $table->string('hero_services_image')->nullable()->after('hero_download_image');
            $table->string('hero_products_image')->nullable()->after('hero_services_image');
            $table->string('hero_podcasts_image')->nullable()->after('hero_products_image');
            $table->string('hero_partnership_image')->nullable()->after('hero_podcasts_image');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'hero_home_image',
                'hero_about_image',
                'hero_download_image',
                'hero_services_image',
                'hero_products_image',
                'hero_podcasts_image',
                'hero_partnership_image',
            ]);
        });
    }
};
