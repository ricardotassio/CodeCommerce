<?php
/**
 * Created by PhpStorm.
 * User: ricardotassio
 * Date: 05/08/15
 * Time: 22:57
 */

namespace CodeCommerce\Services\Product;


use CodeCommerce\Repositories\Product\ProductRepositoryInterface;
use CodeCommerce\Services\Product\Contracts\ProductServiceInterface;
use Illuminate\Support\Facades\Storage;

class ProductService implements ProductServiceInterface
{

    private $repository;
    //private $storage = ['disk'=>'s3','url'=>'S3_IMAGE_URL'];
    private $storage = ['disk'=>'public_local','url'=>'APP_IMAGE_URL'];

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store( $request)
    {
        $input = $request->all();
        $product = $this->repository->fill( $input);
        $product->save();
    }

    public function index( )
    {
        return $this->paginate( 10);
    }

    public function destroy ( $productId)
    {
        $image = $this->repository->find( $productId)->images;

        foreach($image as $images) {
            $images = (object)$images;
            $name = $images->id.'.'.$images->extension;

            if( Storage::disk($this->storage['disk'])->exists( $name)) {
                Storage::disk($this->storage['disk'])->delete( $name);
            }
        }
    }

    private function paginate($limit=null, $collumn= array('*'))
    {
        return ($this->repository->paginate( $limit, $collumn));
    }


}