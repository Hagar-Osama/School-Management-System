<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStudentRefundIdToFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funds', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id')->nullable()->change();
            $table->unsignedBigInteger('student_refund_id')->nullable()->after('payment_id');
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
        Schema::table('funds', function (Blueprint $table) {
            //
        });
    }
}
