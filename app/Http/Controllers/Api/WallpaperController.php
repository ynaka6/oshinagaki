<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wallpaper;
use Auth;

class WallpaperController extends Controller
{
    private $wallpaper;

    public function __construct(Wallpaper $wallpaper)
    {
        $this->wallpaper = $wallpaper;
    }

    public function count(Request $request): int
    {
        return $this->wallpaper->count();
    }

    public function index(Request $request)
    {
        return $this->font->orderBy('id', 'desc')->get();
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
