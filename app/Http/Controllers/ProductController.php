<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
        $products = Product::with('category', 'brand')
        ->orderBy('name', 'ASC');

    return DataTables::of($products)
        ->addIndexColumn()
        ->addColumn('category.name', function($product) {
            return $product->category ? $product->category->name : ''; // Periksa apakah category ada
        })
        ->addColumn('brand.name', function($product) {
            return $product->brand ? $product->brand->name : ''; // Periksa apakah brand ada
        })
        ->addColumn('action', function($row) {
            $editUrl = route('products.edit', $row->id);
            $deleteUrl = route('products.destroy', $row->id);

            $btnEdit = '<a href="'.$editUrl.'" class="btn btn-info btn-sm">Edit</a>';
            $btnDelete = '
                <form action="'.$deleteUrl.'" method="POST" style="display:inline">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Delete</button>
                </form>
            ';

            return $btnEdit . ' ' . $btnDelete;
        })
        ->rawColumns(['action']) // Mengizinkan HTML di kolom action
        ->make(true);
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
