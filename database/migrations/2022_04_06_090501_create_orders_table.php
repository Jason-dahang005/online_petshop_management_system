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
            $table->foreignId('user_id')->constrained();
            $table->string('subtotal');
            $table->string('discount')->default(0);
            $table->string('tax');
            $table->string('total');
            $table->string('fullname');
            $table->string('mobile');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('zipcode');
            $table->string('barangay');
            $table->string('status')->default('ordered');
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
