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
}
