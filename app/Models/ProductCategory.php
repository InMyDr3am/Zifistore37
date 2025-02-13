<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class ProductCategory extends Model
{
    protected $table = 'product_categories';

    protected $fillable = ["name"];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }

    public static function getAllData()
    {
        return self::select("id","name")
                ->orderBy('name', 'ASC')
                ->get();
    }

    public static function getDataForDatatables()
    {
        $productCategories = self::getAllData();

        return DataTables::of($productCategories)
            ->addColumn('no', function($productCategories) {
                return '';
            })
            ->addColumn('action', function($row) {
                $editUrl = route('product-categories.edit', $row->id);
                $deleteUrl = route('product-categories.destroy', $row->id);

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
