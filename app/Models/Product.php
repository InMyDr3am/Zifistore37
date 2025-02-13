<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ["name", "product_category_id", 
        "product_brand_id", "stock", "min_stock", 
        "cost_price", "offline_price", "marketplace_price" ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function brand()
    {
        return $this->belongsTo(ProductBrand::class, 'product_brand_id');
    }
  
    public static function getAllData()
    {
        return self::select("id", "name", "product_category_id", 
            "product_brand_id", "stock", "min_stock", 
            "cost_price", "offline_price", "marketplace_price")
            ->orderBy('name', 'ASC')
            ->get();
    }

    public static function getDataForDatatables()
    {
        $products = Product::select("id", "name", "product_category_id", 
        "product_brand_id", "stock", "min_stock", 
        "cost_price", "offline_price", "marketplace_price")
        ->orderBy('name', 'ASC')
        ->get();

        return DataTables::of($products)
            ->addColumn('no', function($product) {
                return '';
            })
            // ->addColumn('category', function($product) {
            //     return $product->category ? $product->category->name : '-';
            // })
            // ->addColumn('brand', function($product) {
            //     return $product->brand ? $product->brand->name : '-';
            // })
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
}
