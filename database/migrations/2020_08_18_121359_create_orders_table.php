<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('status', ['pending','processing','completed'])->default('pending');
            $table->float('grand_total');
            $table->integer('item_count');
            $table->boolean('is_paid')->default(false);

            $table->string('shipping_fullname');
            $table->string('shipping_country');
            $table->string('shipping_street')->nullable();
            $table->string('shipping_apartment')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_postcode')->nullable();
            $table->string('shipping_email');
            $table->string('shipping_phone')->nullable();

            $table->string('order_by')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
