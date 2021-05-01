<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_id');
            $table->decimal('payment')->nullable();
            $table->enum('method',['GCASH','COD','BANK']);
            $table->decimal('total_amount');
            $table->enum('payment_status',['Paid', 'Not yet Paid'])->nullable();
            $table->enum('delivery_status',['Delivered', 'To be delivered' , 'Pending'])->nullable();
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
        Schema::dropIfExists('checkout_details');
    }
}
