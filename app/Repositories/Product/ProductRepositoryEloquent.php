<?php
/**
 * Created by PhpStorm.
 * User: ricardotassio
 * Date: 25/07/15
 * Time: 11:46
 */

namespace CodeCommerce\Repositories\Product;


use CodeCommerce\Entities\Product;
use CodeCommerce\Repositories\AbstractEloquentRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class ProductRepositoryEloquent extends AbstractEloquentRepository implements ProductRepositoryInterface
{
    public function model()
    {
        return Product::class;
    }
}