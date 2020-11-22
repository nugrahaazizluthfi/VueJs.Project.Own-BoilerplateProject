<?php namespace App\Repositories\BO;

use App\Repositories\Base\Eloquent\Repository;

class UserRepository extends Repository {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\Models\User';
    }
}
