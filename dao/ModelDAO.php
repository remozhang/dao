<?php

namespace DAO;

use DAO\Model;


/**
 * Interface ModelDAO
 *
 * @package zlDAO
 */
interface ModelDAO
{
    /**
     * @param $id
     *
     * @return mixed
     */
    public function get($id);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);

    /**
     * @param \DAO\Model $model
     *
     * @return mixed
     */
    public function update(Model $model);

    /**
     * @param \DAO\Model $model
     *
     * @return mixed
     */
    public function create(Model $model);

}