<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_transactions', function (Blueprint $table) {
            $table->increments('trans_id');
            $table->integer('user_id')->default(0);
            $table->integer('trans_total')->default(0);
            $table->string('trans_content')->nullable();
            $table->string('trans_address')->nullable();
            $table->string('trans_phone')->nullable();
            $table->string('trans_email')->nullable();
            $table->tinyInteger('trans_status')->default(0);
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
        Schema::dropIfExists('tbl_transactions');
    }
}
