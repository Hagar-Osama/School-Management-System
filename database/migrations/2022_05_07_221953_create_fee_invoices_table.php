<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_invoices', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('grade_id')->constrained('grades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('fee_id')->constrained('fees')->onDelete('cascade')->onUpdate('cascade');
            $table->text('description')->nullable();
            $table->decimal('amount');
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
        Schema::dropIfExists('fee_invoices');
    }
}
