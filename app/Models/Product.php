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

}
