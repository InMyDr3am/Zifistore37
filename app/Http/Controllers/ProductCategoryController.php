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
    
    public function edit($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        return view('product-categories.edit', compact('productCategory'));
    }

    public function update(ProductCategoryRequest $request, $id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->update($request->validated());
        return redirect()->route('product-categories.edit', $productCategory->id)
            ->with('success', 'Product Category Updated Succesfully !');
    }

    public function destroy($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->delete();
        return redirect()->route('product-categories.index')
            ->with('success', 'Product Category Deleted Succesfully!');
    }

}
