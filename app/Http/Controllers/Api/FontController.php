<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Font;

class FontController extends Controller
{
    private $font;

    public function __construct(Font $font)
    {
        $this->font = $font;
    }

    public function count(Request $request): int
    {
        return $this->font->count();
    }

    public function index(Request $request): int
    {
        return $this->font->orderBy('id', 'desc')->get();
    }
}
