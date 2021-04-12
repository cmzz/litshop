<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 191)->unique();
            $table->string('admin_name', 191);
            $table->string('type', 191);
            $table->string('validation', 191)->nullable();
            $table->integer('position')->nullable();
            $table->boolean('is_required')->default(0);
            $table->boolean('is_unique')->default(0);
            $table->boolean('value_per_locale')->default(0);
            $table->boolean('value_per_channel')->default(0);
            $table->boolean('is_filterable')->default(0);
            $table->boolean('is_configurable')->default(0);
            $table->boolean('is_user_defined')->default(1);
            $table->boolean('is_visible_on_front')->default(0);
            $table->timestamps();
            $table->string('swatch_type', 191)->nullable();
            $table->boolean('use_in_flat')->default(1);
            $table->boolean('is_comparable')->default(0);
            $table->integer('ui_show_types')->nullable()->default(0);
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
        Schema::dropIfExists('attributes');
    }
}
