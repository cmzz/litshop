<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps(3);
            $table->softDeletes('deleted_at', 3)->index('idx_attribute_deleted_at');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('consignee')->nullable();
            $table->tinyInteger('address_type')->nullable();
            $table->tinyInteger('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('postcode')->nullable();
            $table->string('street')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->bigInteger('area_no')->nullable();
            $table->bigInteger('city_no')->nullable();
            $table->bigInteger('state_no')->nullable();
            $table->bigInteger('country_no')->nullable();
            $table->bigInteger('email')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('label')->nullable();
            $table->point('centre')->nullable();
            $table->bigInteger('postal_code')->nullable();
            $table->boolean('is_default')->nullable();
            $table->string('additional')->nullable();
            $table->boolean('is_filterable')->nullable();
            $table->integer('swatch_type')->nullable();
            $table->boolean('is_visible_on_front')->nullable();
            $table->boolean('is_sku_attribute')->nullable();
            $table->integer('type')->nullable();
            $table->string('validation')->nullable();
            $table->integer('position')->nullable();
            $table->boolean('is_configurable')->nullable();
            $table->integer('use_in_flat')->nullable();
            $table->string('code')->nullable();
            $table->boolean('is_required')->nullable();
            $table->boolean('is_unique')->nullable();
            $table->boolean('is_user_defined')->nullable();
            $table->boolean('is_comparable')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute');
    }
}
