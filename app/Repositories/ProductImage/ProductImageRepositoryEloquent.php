<?php
/**
 * Created by PhpStorm.
 * User: ricardotassio
 * Date: 27/07/15
 * Time: 15:41
 */

namespace CodeCommerce\Repositories\ProductImage;

use CodeCommerce\Entities\ProductImage;
use Prettus\Repository\Eloquent\BaseRepository;


class ProductImageRepositoryEloquent extends BaseRepository implements ProductImageRepositoryInterface
{
    private $storage = ['disk'=>'public_local','url'=>'APP_IMAGE_URL'];

    public function model()
    {
        return ProductImage::class;
    }


}