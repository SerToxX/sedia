<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $siteSetting = SiteSetting::current();

        return view('admin.banner.edit', compact('siteSetting'));
    }

    public function update(Request $request)
    {
        $siteSetting = SiteSetting::current();

        $validated = $request->validate([
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
            'hero_video' => 'nullable|mimetypes:video/mp4,video/quicktime,video/webm|max:51200',
        ], [
            'hero_image.image' => 'El archivo debe ser una imagen.',
            'hero_image.mimes' => 'Formatos permitidos: jpg, jpeg, png, webp.',
            'hero_image.max' => 'La imagen no debe superar 8MB.',
            'hero_video.mimetypes' => 'Formatos permitidos: MP4, MOV o WEBM.',
            'hero_video.max' => 'El video no debe superar 50MB.',
        ]);

        if ($request->hasFile('hero_image')) {
            if ($siteSetting->hero_image) {
                Storage::disk('public')->delete($siteSetting->hero_image);
            }
            $siteSetting->hero_image = $request->file('hero_image')->store('banner', 'public');
        }

        if ($request->hasFile('hero_video')) {
            if ($siteSetting->hero_video) {
                Storage::disk('public')->delete($siteSetting->hero_video);
            }
            $siteSetting->hero_video = $request->file('hero_video')->store('banner', 'public');
        }

        $siteSetting->hero_show_video = $request->boolean('hero_show_video');
        $siteSetting->save();

        return redirect()
            ->route('admin.banner.edit')
            ->with('success', 'Banner actualizado correctamente.');
    }
}
