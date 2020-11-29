<?php namespace App\Services\BO;

use Illuminate\Support\Facades\Hash;
use App\Repositories\BO\MenuRepository as Menu;

class MenuService
{
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Service load all menu data
     * @param Request $request
     * @return mixed
     */
    public function load($request = null)
    {
        if($request === null)
            return ["status" => false, "data" => ["Empty Params"]];

        $result = [];
        try {
            $menus = $this->menu->getMenus();
            if($menus) $result = ["status" => true, "data" => $menus];
        } catch (\Exception $e) {
            $result = [ "status" => false, "data" => $e ];
        }

        return $result;
    }

    /**
     * Service load menu data by id
     * @param Request $request
     * @return mixed
     */
    public function loadById($request = null)
    {
        if($request === null)
            return ["status" => false, "data" => ["Empty Params"]];

        $result = [];
        try {
            $menus = $this->menu->find($request);
            if($menus) $result = ["status" => true, "data" => $menus];
        } catch (\Exception $e) {
            $result = [ "status" => false, "data" => $e ];
        }

        return $result;
    }

    /**
     * Service submit menu data
     * @param Request $request
     * @return mixed
     */
    public function submit($request = null)
    {
        if($request === null)
            return ["status" => false, "data" => ["Empty Params"]];

        $result = [];
        try {
            $menus = $this->menu->create($request);
            if($menus) $result = ["status" => true, "data" => $menus];
        } catch (\Exception $e) {
            $result = [ "status" => false, "data" => $e ];
        }

        return $result;
    }

    /**
     * Service submit menu data
     * @param Request $request
     * @return mixed
     */
    public function update($request = null, $id = null)
    {
        if($request === null || $id === null)
            return ["status" => false, "data" => ["Empty Params"]];

        $result = [];
        try {
            $menus = $this->menu->update($request, $id);
            if($menus) $result = ["status" => true, "data" => $menus];
        } catch (\Exception $e) {
            $result = [ "status" => false, "data" => $e ];
        }

        return $result;
    }

    /**
     * Service delete menu data
     * @return mixed
     */
    public function delete($id = null)
    {
        if($id === null)
            return ["status" => false, "data" => ["Empty Id"]];

        $result = [];
        try {
            $menus = $this->menu->delete($id);
            if($menus) $result = ["status" => true, "data" => $menus];
        } catch (\Exception $e) {
            $result = [ "status" => false, "data" => $e ];
        }

        return $result;
    }

    /**
     * Service load options menu
     * @return mixed
     */
    public function loadParentOptions()
    {
        return $this->menu->getParentOptions();
    }
}
