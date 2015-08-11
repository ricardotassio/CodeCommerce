<?php
/**
 * Created by PhpStorm.
 * User: ricardotassio
 * Date: 27/07/15
 * Time: 11:59
 */

namespace CodeCommerce\Repositories\Category;
use CodeCommerce\Entities\Category;
use CodeCommerce\Repositories\AbstractEloquentRepository;


class CategoryRepositoryEloquent extends AbstractEloquentRepository implements CategoryRepositoryInterface
{
    public $model;

    public function model()
    {
        return $this->model = Category::class;
    }


}