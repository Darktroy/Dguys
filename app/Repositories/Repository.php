<?php
namespace App\Repositories;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * Description of Repository
 *
 * @author root
 */
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    public function __call($method, $arguments)
{
     return $this->model->$method(...$arguments);
}
    // Get all instances of model
    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    // create a new record in the database
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // remove record from the database
    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id
    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    // update record in the database
    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $record = $this->find($id);

        return $record->update($data);
    }

    // Eager load database relationships
    /**
     * @param $relations
     * @return mixed
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
