<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Repositories\Category\CategoryRepositoryInterface;
use CodeCommerce\Repositories\Product\ProductRepositoryInterface;
use CodeCommerce\Repositories\ProductImage\ProductImageRepositoryInterface;
use CodeCommerce\Services\Product\Contracts\ProductImageServiceInterface;
use CodeCommerce\Services\Product\Contracts\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminProductController extends Controller
{
    private $productRepository;

    private $storage = ['disk'=>'public_local','url'=>'APP_IMAGE_URL'];
    private $categoryRepository;
    private $productImageRepository;
    private $serviceImage;
    private $serviceProduct;

    public function __construct( ProductRepositoryInterface $productRepository,
                                 CategoryRepositoryInterface $categoryRepository,
                                 ProductImageRepositoryInterface $productImageRepository,
                                 ProductImageServiceInterface $serviceImage,
                                 ProductServiceInterface $serviceProduct)
    {
        $this->productRepository      = $productRepository;
        $this->categoryRepository     = $categoryRepository;
        $this->productImageRepository = $productImageRepository;
        $this->serviceImage           = $serviceImage;
        $this->serviceProduct         = $serviceProduct;

    }

    public function index()
    {
        $products = $this->serviceProduct->index();

        return view( 'product.index',compact( 'products'));
    }

    public function create()
    {
        $categories =  $this->categoryRepository->lists('name','id')->all();
        return view( 'product.create', compact('categories'));
    }

    public function store( Requests\ProductImageRequest $request)
    {
        $this->serviceProduct->store( $request);
        return redirect()->route( 'product.index');
    }

    public function destroy( $productId)
    {
        $this->serviceProduct->destroy( $productId);
        $this->productRepository->find( $productId)->delete();
        return redirect()->route( 'product.index');
    }

    public function edit( $id)
    {
        $categories =  $this->categoryRepository->lists( 'name','id');
        $product = $this->productRepository->find($id);
        return view('product.edit',compact( 'product','categories'));
    }

    public function update( Requests\ProductRequest $request, $id)
    {
        $product = $this->productRepository->find( $id)->update( $request->all());
        return redirect()->route( 'product.index');
    }

    public function images( $id)
    {
        $product = $this->productRepository->find( $id);
        //$url = env( $this->storage['url'],'uploads/');
        $url = 'uploads/';
        return view( 'product.images', compact( 'product', 'url'));
    }

    public function createImage($id)
    {
        $product = $this->productRepository->find($id);
        return view('product.createImage',compact('product'));
    }

    public function storeImage(Request $request, $id, ProductImageRepositoryInterface $productImage)
    {
        $this->serviceImage->create( $request, $id, $productImage);
        return redirect()->route('product.images',['id'=>$id]);
    }

    public function destroyImage( $id)
    {
        $product = $this->serviceImage->destroy( $id);
        return redirect()->route( 'product.images',['id'=>$product->id]);
    }


}
