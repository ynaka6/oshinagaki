<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Http\Requests\Menu\CreateRequest;
use App\Http\Requests\Menu\UpdateRequest;
use Auth;
use DB;

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
        return $this->menu->findPage($request->next);
    }


    public function create(CreateRequest $request)
    {
        $this->menu->create([ 'user_id' => Auth::user()->id ] + $request->validated());
        return response('', 200);
    }
}
