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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marketplace_id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('sales_status_id');   
            $table->string('no_resi')->nullable();    
            $table->string('no_order')->nullable();    
            $table->date('date');    
            $table->float('total_price');
            $table->foreign('marketplace_id')->references('id')->on('marketplaces');
            $table->foreign('buyer_id')->references('id')->on('buyers');   
            $table->foreign('sales_status_id')->references('id')->on('sales_statuses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
