<?php namespace App\Repositories\Base\Contracts;

interface RepositoryInterface {

    public function all($columns = array('*'));

    // public function paginate($perPage = 15, $columns = array('*'));

    // public function create(array $data);

    // public function update(array $data, $id);

    // public function delete($id);

    public function find($id, $columns = array('*'));

    public function findBy($conditions = array(), $columns = array('*'));

    public function count();

    public function countBy($conditions = array(), $columns = array('*'));
}
