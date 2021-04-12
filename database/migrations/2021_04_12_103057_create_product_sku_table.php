<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps(3);
            $table->softDeletes('deleted_at', 3)->index('idx_product_sku_deleted_at');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->json('attribute_list')->nullable();
            $table->unsignedBigInteger('banner_media_id')->nullable();
            $table->unsignedBigInteger('main_pic_media_id')->nullable();
            $table->unsignedBigInteger('fee')->nullable();
            $table->unsignedBigInteger('marketing_fee')->nullable();
            $table->integer('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sku');
    }
}
