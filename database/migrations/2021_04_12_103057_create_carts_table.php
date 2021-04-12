<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps(3);
            $table->softDeletes('deleted_at', 3)->index('idx_cart_deleted_at');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->dateTime('add_at', 3)->nullable();
            $table->unsignedBigInteger('sku_id')->nullable();
            $table->unsignedBigInteger('quantity')->nullable();
            $table->integer('status')->nullable();
            $table->string('additional')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
