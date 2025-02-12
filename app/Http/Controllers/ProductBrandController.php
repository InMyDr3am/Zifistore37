<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductBrandRequest;
use App\Models\ProductBrand;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{
    public function index()
    {      
        return view('product-brands.index');
    }

    public function getData()
    {
        return ProductBrand::getDataForDatatables();
    }    

    public function create()
    {
        return view('product-brands.create');
    }

    public function store(ProductBrandRequest $request)
    {
        ProductBrand::create($request->validated());

        return redirect()->route('product-brands.index')
            ->with('success', 'Brand Product added successfully!');
    }

    public function edit($id)
    {
        $productBrand = ProductBrand::findOrFail($id);
        return view('product-brands.edit', compact('productBrand'));
    }

    public function update(ProductBrandRequest $request, $id)
    {
        $productBrand = ProductBrand::findOrFail($id);
        $productBrand->update($request->validated());
        return redirect()->route('product-brands.edit', $productBrand->id)
            ->with('success', 'Product Brand Updated Succesfully !');
    }

    public function destroy($id)
    {
        $productBrand = ProductBrand::findOrFail($id);
        $productBrand->delete();
        return redirect()->route('product-brands.index')
            ->with('success', 'Product Brand Deleted Succesfully!');
    }
}
