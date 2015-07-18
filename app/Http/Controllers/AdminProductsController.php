<?php

namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Products;
use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $productsModel;

    public function __construct(Products $productsModel)
    {
        $this->productsModel = $productsModel;
    }

    public function index()
    {
        $products = $this->productsModel->paginate(10);
        return view('products.index',compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name','id');
        return view('products.create',compact('categories'));
    }

    public function store(Requests\ProductsRequest $request)
    {
        $input = $request->all();
        $products = $this->productsModel->fill($input);
        $products->save();
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->productsModel->find($id)->delete();
        return redirect()->route('products.index');
    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name','id');
        $products = $this->productsModel->find($id);
        return view('products.edit',compact('products','categories'));

    }

    public function update(Requests\ProductsRequest $request, $id)
    {
        $products = $this->productsModel->find($id)->update($request->all());
        return redirect()->route('products.index');
    }
}
