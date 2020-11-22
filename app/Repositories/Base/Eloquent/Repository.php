<?php namespace App\Repositories\Base\Eloquent;

use App\Repositories\Base\Contracts\RepositoryInterface;
use App\Repositories\Base\Exceptions\RepositoryExceptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

/**
 * Class Repository
 * @package App\Repositories\Eloquent
 */
abstract class Repository implements RepositoryInterface {

    /**
     * @var App
     */
    private $app;

    /**
     * @var
     */
    protected $model;

    /**
     * @param App $app
     * @throws \App\Repositories\Base\Exceptions\RepositoryException
     */
    public function __construct(App $app) {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*')) {
        return $this->model->get($columns);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*')) {
        return $this->model->find($id, $columns);
    }

    /**
     * @param array $conditions
     * @param array $columns
     * @return mixed
     */
    public function findBy($conditions = array(), $columns = array('*')) {
        if(!empty($conditions) && is_array($conditions))
        {
            return $this->model->where($conditions)->first($columns);
        }
        return null;
    }

    /**
     * @return mixed
     */
    public function count() {
        return $this->model->count();
    }

    /**
     * @param array $conditions
     * @param array $columns
     * @return mixed
     */
    public function countBy($conditions = array(), $columns = array('*')) {
        if(!empty($conditions) && is_array($conditions))
        {
            return $this->model->where($conditions)->count();
        }
        return 0;
    }

    /**
     * @return Model
     * @throws RepositoryException
     */
    public function makeModel() {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }
}
