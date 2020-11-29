<?php namespace App\Repositories\BO;

use App\Repositories\Base\Eloquent\Repository;

class MenuRepository extends Repository {
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\Menu';
    }

    public function getMenus(){
        return $this->model->with('children')->where('parent','=','0')->get();
    }

    public function getParentOptions(){
        return $this->model->where('parent', '=', '0')->get();
    }
}
