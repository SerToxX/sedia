<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = collect(array_keys(Banner::CONFIG))
            ->map(fn (string $key) => Banner::forKey($key));

        return view('admin.banners.index', compact('banners'));
    }

    public function update(Request $request, Banner $banner)
    {
        $rules = [
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:8192',
        ];

        if ($banner->supportsVideo()) {
            $rules['video'] = 'nullable|mimetypes:video/mp4,video/quicktime,video/webm|max:51200';
        }

        $validated = $request->validate($rules, [
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'Formatos permitidos: jpg, jpeg, png, webp.',
            'image.max' => 'La imagen no debe superar 8MB.',
            'video.mimetypes' => 'Formatos permitidos: MP4, MOV o WEBM.',
            'video.max' => 'El video no debe superar 50MB.',
        ]);

        if ($request->hasFile('image')) {
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }
            $banner->image = $request->file('image')->store('banners', 'public');
        }

        if ($banner->supportsVideo()) {
            if ($request->hasFile('video')) {
                if ($banner->video) {
                    Storage::disk('public')->delete($banner->video);
                }
                $banner->video = $request->file('video')->store('banners', 'public');
            }

            $banner->show_video = $request->boolean('show_video');
        }

        $banner->save();

        return redirect()
            ->route('admin.banners.index')
            ->with('success', 'Banner "'.$banner->label().'" actualizado correctamente.');
    }
}
