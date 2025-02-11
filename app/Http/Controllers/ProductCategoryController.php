<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {      
        return view('product-categories.index');
    }

    public function getData()
    {
        return ProductCategory::getDataForDatatables();
    }    

    public function create()
    {
        return view('product-categories.create');
    }

    public function store(ProductCategoryRequest $request)
    {
        ProductCategory::create($request->validated());

        return redirect()->route('product-categories.index')
            ->with('success', 'Category Product added successfully!');
    }

}
