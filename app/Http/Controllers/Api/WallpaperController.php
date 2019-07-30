<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wallpaper;
use Auth;

class WallpaperController extends Controller
{
    public function index(Request $request): Response
    {
        $user = Auth::user();
        $result = $user->findMedia($request->next);
        return $result;
    }

    public function uploads(Request $request): Media
    {
        $user = Auth::user();

        $file = $request->file;
        $fileInfo = explode('.', $file->getClientOriginalName());
        $filename = $file->store(Wallpaper::FILE_DIR);
        $ext = $fileInfo[count($fileInfo) - 1];
        $name = str_replace('.' . $ext, '', $file->getClientOriginalName());
        return $user->uploadMedia([
            'name' => $name,
            'file' => basename($filename),
            'type' => $ext
        ]);
    }
}
