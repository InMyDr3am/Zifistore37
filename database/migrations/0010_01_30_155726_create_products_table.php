<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('product_brand_id');
            $table->integer('stock');
            $table->integer('min_stock');
            $table->decimal('cost_price', 10, 2);
            $table->decimal('offline_price', 10, 2);
            $table->decimal('marketplace_price', 10, 2);
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->foreign('product_brand_id')->references('id')->on('product_brands');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
