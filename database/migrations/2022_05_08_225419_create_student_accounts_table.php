<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('fee_invoice_id')->nullable()->constrained('fee_invoices')->onDelete('cascade')->onUpdate('cascade');
            $table->string('type');
            $table->date('date');
            $table->text('description')->nullable();
            $table->decimal('credit')->nullable();
            $table->decimal('debit')->nullable();
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
        Schema::dropIfExists('student_accounts');
    }
}
