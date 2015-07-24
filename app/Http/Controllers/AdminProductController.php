<?php

namespace CodeCommerce\Http\Controllers;


use CodeCommerce\ProductImage;
use CodeCommerce\Product;
use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminProductController extends Controller
{
    private $productModel;
    //private $storage = ['disk'=>'s3','url'=>'S3_IMAGE_URL'];
    private $storage = ['disk'=>'public_local','url'=>'APP_IMAGE_URL'];


    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        $products = $this->productModel->paginate(10);
        return view('product.index',compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name','id');
        return view('product.create',compact('categories'));
    }

    public function store(Requests\ProductImageRequest $request)
    {
        $input = $request->all();
        $product = $this->productModel->fill($input);
        $product->save();
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        return redirect()->route('product.index');
    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name','id');
        $product = $this->productModel->find($id);
        return view('product.edit',compact('product','categories'));

    }

    public function update(Requests\ProductRequest $request, $id)
    {
        $product = $this->productModel->find($id)->update($request->all());
        return redirect()->route('product.index');
    }

    public function images($id)
    {
        $product = $this->productModel->find($id);
        $url = env($this->storage['url']);
        return view('product.images',compact('product','url'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);
        return view('product.createImage',compact('product'));
    }

    public function storeImage(Request $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);
        Storage::disk($this->storage['disk'])->put($image->id.'.'.$extension, File::get($file));
        return redirect()->route('product.images',['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);
        $product = $image->product;

        if(Storage::disk($this->storage['disk'])->exists($image->id.'.'.$image->extension)) {
            Storage::disk($this->storage['disk'])->delete($image->id.'.'.$image->extension);
        }

        $image->delete();
        return redirect()->route('product.images',['id'=>$product->id]);
    }
}
