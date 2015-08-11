<?php
/**
 * Created by PhpStorm.
 * User: ricardotassio
 * Date: 05/08/15
 * Time: 22:56
 */

namespace CodeCommerce\Services\Product\Contracts;


interface ProductServiceInterface
{

    public function store( $request);
    /**
     * @param array $image
     */
    public function destroy ( $id);
}