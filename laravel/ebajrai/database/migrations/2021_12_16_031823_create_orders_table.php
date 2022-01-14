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
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('subtotal');
            $table->decimal('discount')->default;
            $table->decimal('tax');
            $table->decimal('total');
            $table->string('name');
            $table->string('mobile');
            $table->string('email');
            $table->string('address');
            $table->enum('status', ['pending','ordered','delivered','completed','canceled'])->default('pending');
            $table->string('is_shipping_different')->default(false);
            $table->timestamps();
            $table->date('delivered_date')->nullable();
            $table->date('canceled_date')->nullable();
            $table->date('pickup_date')->nullable();
            $table->text('courier')->nullable();
            $table->text('trackingno')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
