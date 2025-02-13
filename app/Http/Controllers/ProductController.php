<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {      
        return view('products.index');
    }
    // public function index()
    // {
    //     // Mengambil semua produk dengan relasi kategori dan merek
    //     $products = Product::with(['category', 'brand'])->get();

    //     // Mengirim data produk ke view
    //     return view('products.index', compact('products'));
    // }

    public function getData()
    {
        return Product::getDataForDatatables();
    }    

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        // Product::create($request->validated());

        return redirect()->route('products.index')
            ->with('success', 'Product added successfully!');
    }
}
