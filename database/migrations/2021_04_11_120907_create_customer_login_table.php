<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_login', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps(3);
            $table->softDeletes('deleted_at', 3)->index('idx_customer_login_deleted_at');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->tinyInteger('auth_type')->nullable();
            $table->string('auth_id')->nullable();
            $table->string('auth_value')->nullable();
            $table->json('extra_value1')->nullable();
            $table->json('extra_value2')->nullable();
            $table->tinyInteger('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_login');
    }
}
