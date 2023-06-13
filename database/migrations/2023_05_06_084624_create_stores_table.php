<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_category_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->mediumText('name')->nullable();
            $table->mediumText('description')->nullable();
            $table->integer('rating')->nullable();
            $table->string('image')->nullable();
            $table->mediumText('latitude')->nullable();
            $table->mediumText('longitude')->nullable();
            $table->foreign('store_category_id')->references('id')->on('store_categories')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->softDeletes();

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
        Schema::dropIfExists('stores');
    }
}
