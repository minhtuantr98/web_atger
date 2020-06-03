<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->increments('pro_id');
            $table->string('pro_name');
            $table->string('pro_slug');
            $table->integer('pro_price');
            $table->string('pro_img');
            $table->integer('pro_sold')->default(0);
            $table->tinyInteger('pro_status')->nullable();
            $table->string('pro_description')->nullable();
            $table->text('pro_content')->nullable();
            $table->tinyInteger('pro_discount')->nullable();
            $table->tinyInteger('pro_featured');
            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')
                  ->references('cate_id')
                  ->on('tbl_categories')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('tbl_products');
    }
}
