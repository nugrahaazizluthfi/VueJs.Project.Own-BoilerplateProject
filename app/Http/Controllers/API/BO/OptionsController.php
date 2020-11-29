<?php

namespace App\Http\Controllers\API\BO;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Services\BO\MenuService as Menu;

class OptionsController extends BaseController
{
    /**
     * Create a new MenusController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api',['except' => ['load']]);
    }

    /**
     * Get load data .
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function load(Request $request, Menu $menu)
    {
        return $this->success($menu->loadMenuData($request->all()), 'Load menu success...');
    }
}
