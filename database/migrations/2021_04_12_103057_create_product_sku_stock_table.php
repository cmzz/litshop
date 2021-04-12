<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSkuStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sku_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps(3);
            $table->softDeletes('deleted_at', 3)->index('idx_product_sku_stock_deleted_at');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('sku_id')->nullable();
            $table->unsignedBigInteger('stock')->nullable();
            $table->integer('status')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sku_stock');
    }
}
