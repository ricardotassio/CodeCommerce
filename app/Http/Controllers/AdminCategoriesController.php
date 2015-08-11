<?php

namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    private  $categoryRepository;

    public function __construct( CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $categories =  $this->categoryRepository->paginate(10);
        return view("categories.index",compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Requests\CategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->categoryRepository->fill($input);
        $category->save();
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $this->categoryRepository->find($id)->delete();
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        return view('categories.edit',compact('category'));
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
        $category = $this->categoryRepository->find($id)->update($request->all());
        return redirect()->route('categories.index');
    }
}
