<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpgradeStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upgrade_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('from_grade')->constrained('grades')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('from_class')->constrained('classes')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('from_section')->constrained('sections')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('to_grade')->constrained('grades')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('to_class')->constrained('classes')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('to_section')->constrained('sections')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('upgrade_students');
    }
}
