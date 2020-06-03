<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransPtttToTransactionsTable extends Migration
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
            $table->tinyInteger('trans_PTTT')->default(0)->after('trans_status');
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
            $table->dropColumn('trans_PTTT');

        });
    }
}
