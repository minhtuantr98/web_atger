<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsDeleteToTblTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_transactions', function (Blueprint $table) {
            //
            $table->tinyInteger('isDelete')->default(0)->after('trans_PTTT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_transactions', function (Blueprint $table) {
            //
            $table->dropColumn('isDelete');
        });
    }
}
