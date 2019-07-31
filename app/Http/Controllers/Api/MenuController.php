<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function count(Request $request): int
    {
        return $this->menu->count();
    }

    public function index(Request $request)
    {
        return $this->menu->orderBy('id', 'desc')->get();
    }
}
