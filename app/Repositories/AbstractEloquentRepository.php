<?php
/**
 * Created by PhpStorm.
 * User: ricardotassio
 * Date: 05/08/15
 * Time: 23:52
 */

namespace CodeCommerce\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;

abstract class AbstractEloquentRepository extends BaseRepository
{


    public function lists( $value, $key)
    {
        return $this->model->lists( $value, $key);
    }

    public function fill( $value)
    {
        return $this->model->fill( $value);
    }


}