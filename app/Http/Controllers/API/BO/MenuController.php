<?php

namespace App\Http\Controllers\API\BO;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Services\BO\MenuService as Menu;

class MenuController extends BaseController
{
    /**
     * Create a new MenusController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api',['except' => ['load','submit','loadById']]);
    }

    /**
     * Get load data .
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function load(Request $request, Menu $menu)
    {
        $load = $menu->load($request->all());

        if($load['status'])
            return $this->success($load['data'], '[success] Load data menus...');

        return $this->error($load['data'],'[failed] Load data menus...', 500);
    }

    /**
     * Get load data by id.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadById(Request $request, Menu $menu, $id)
    {
        $load = $menu->loadById($id);

        if($load['status'])
            return $this->success($load['data'], '[success] Load data menu...');

        return $this->error($load['data'],'[failed] Load data menu...', 500);
    }

    /**
     * submit menu data .
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function submit(Request $request, Menu $menu)
    {
        $submit = $menu->submit($request->all());

        if($submit['status'])
            return $this->success($submit['data'], '[success] Submit data menu...');

        return $this->error($submit['data'],'[error] Submit data menu...', 500);
    }

    /**
     * update menu data .
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Menu $menu, $id)
    {
        $submit = $menu->update($request->all(), $id);

        if($submit['status'])
            return $this->success($submit['data'], '[success] Update data menu...');

        return $this->error($submit['data'],'[error] Update data menu...', 500);
    }

    /**
     * update menu data .
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Menu $menu, $id)
    {
        $submit = $menu->delete($id);

        if($submit['status'])
            return $this->success($submit['data'], '[success] Delete data menu...');

        return $this->error($submit['data'],'[error] Delete data menu...', 500);
    }

    /**
     * Get load data .
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadParentOptions(Request $request, Menu $menu)
    {
        return $this->success($menu->loadParentOptions(), 'Load menu success...');
    }
}
