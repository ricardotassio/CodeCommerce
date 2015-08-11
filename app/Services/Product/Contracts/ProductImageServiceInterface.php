<?php
/**
 * Created by PhpStorm.
 * User: ricardotassio
 * Date: 28/07/15
 * Time: 10:11
 */

namespace CodeCommerce\Services\Product\Contracts;



use CodeCommerce\Entities\Contracts\ProductModelInterface;
use CodeCommerce\Entities\ProductImage;
use CodeCommerce\Http\Requests\Request;
use CodeCommerce\Repositories\ProductImage\ProductImageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use PhpSpec\Wrapper\Collaborator;

interface ProductImageServiceInterface
{

    /**
     *
     * @return mixed
     */
    public function create( $request, $id, $productImage);


    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id);


    /**
     * @param array $image
     */
    public function destroy ( $id);



}