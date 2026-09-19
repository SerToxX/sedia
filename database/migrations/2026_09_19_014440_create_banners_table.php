<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->boolean('show_video')->default(false);
            $table->timestamps();
        });

        // Migra el banner del home desde site_settings (modulo anterior de un solo banner).
        if (Schema::hasTable('site_settings')) {
            $siteSetting = DB::table('site_settings')->find(1);

            if ($siteSetting) {
                DB::table('banners')->insert([
                    'key' => 'home',
                    'image' => $siteSetting->hero_image,
                    'video' => $siteSetting->hero_video,
                    'show_video' => $siteSetting->hero_show_video,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            Schema::dropIfExists('site_settings');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
