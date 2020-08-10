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
            $table->string('user_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('paying_amount')->nullable();
            $table->string('bln_transection')->nullable();
            $table->string('order_id')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('shipping')->nullable();
            $table->string('valt')->nullable();
            $table->string('total')->nullable();
            $table->string('statuse')->nullable()->default('0');
            $table->string('month')->nullable();
            $table->string('date')->nullable();
            $table->string('year')->nullable();
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
