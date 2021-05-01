<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('is_active')->default(1);
            $table->unsignedInteger('shade_id');
            $table->string('shade_name');
            $table->enum('stock_status',['instock', 'outofstock'])->nullable();
            $table->unsignedInteger('quantity')->default(10);
            $table->foreign('shade_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('shades');
    }
}
