<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCatalogMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_catalog_mapping', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps(3);
            $table->softDeletes('deleted_at', 3)->index('idx_product_catalog_mapping_deleted_at');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('catalog_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_catalog_mapping');
    }
}
