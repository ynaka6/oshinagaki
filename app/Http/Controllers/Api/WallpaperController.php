<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wallpaper;
use App\Http\Requests\Wallpaper\UpdateRequest;
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
        return $this->wallpaper->orderBy('id', 'desc')->get();
    }

    public function upload(Request $request)
    {
        $file = $request->file;
        $fileInfo = explode('.', $file->getClientOriginalName());
        $filename = $file->store(Wallpaper::FILE_DIR);
        $ext = $fileInfo[count($fileInfo) - 1];
        $name = str_replace('.' . $ext, '', $file->getClientOriginalName());
        $this->wallpaper->create([
            'user_id' => Auth::user()->id,
            'name' => $name,
            'file' => basename($filename),
            'type' => $ext
        ]);
        return $this->index($request);
    }

    public function update(UpdateRequest $request, Wallpaper $wallpaper)
    {
        $wallpaper->fill($request->validated())->save();
        return response('', 200);
    }
}
