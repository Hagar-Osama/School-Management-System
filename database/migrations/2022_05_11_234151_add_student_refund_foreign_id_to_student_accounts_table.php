<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStudentRefundForeignIdToStudentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('student_refund_id')->nullable()->after('refund_id');
            $table->foreign('student_refund_id')->references('id')->on('student_refunds')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_account', function (Blueprint $table) {
            //
        });
    }
}
