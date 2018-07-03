<?php

namespace DAO\Dao;

use DAO\Model\Model;
/**
 * Interface ModelDAO
 *
 * @package DAO
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
     * @param \DAO\Model\Model $model
     *
     * @return mixed
     */
    public function update(Model $model);

    /**
     * @param \DAO\Model\Model $model
     *
     * @return mixed
     */
    public function create(Model $model);

}