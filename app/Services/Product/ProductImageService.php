<?php
/**
 * Created by PhpStorm.
 * User: ricardotassio
 * Date: 28/07/15
 * Time: 09:59
 */

namespace CodeCommerce\Services\Product;


use CodeCommerce\Entities\Contracts\ProductModelInterface;

use CodeCommerce\Http\Requests\Request;
use CodeCommerce\Repositories\ProductImage\ProductImageRepositoryInterface;
use CodeCommerce\Services\Product\Contracts\ProductImageServiceInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductImageService implements ProductImageServiceInterface
{

    private $repository;
    //private $storage = ['disk'=>'s3','url'=>'S3_IMAGE_URL'];
    private $storage = ['disk'=>'public_local','url'=>'APP_IMAGE_URL'];

    public function __construct( ProductImageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function create( $request, $id,  $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $productImage->create(['product_id'=>$id, 'extension'=>$extension]);
        Storage::disk($this->storage['disk'])->put($image->id.'.'.$extension, File::get($file));
    }


    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

    public function destroy(  $id)
    {
        $image = $this->repository->find( $id);
        $product = $image->product;

        if(Storage::disk($this->storage['disk'])->exists( $image->id.'.'.$image->extension)) {
            Storage::disk($this->storage['disk'])->delete( $image->id.'.'.$image->extension);
        }
        $image->delete();
        return $product;
    }




}