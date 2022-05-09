<?php

use App\Models\Blood;
use App\Models\Classes;
use App\Models\Grade;
use App\Models\myParent;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
        $students = new Student();
        $students->name = ['ar' => 'احمد ابراهيم', 'en' => 'Ahmed Ibrahim'];
        $students->email = 'Ahmed_Ibrahim@yahoo.com';
        $students->password = Hash::make('12345678');
        $students->gender_id = 1;
        $students->nationality_id = Nationality::all()->unique()->random()->id;
        $students->blood_id =Blood::all()->unique()->random()->id;
        $students->birth_date = date('1995-01-01');
        $students->grade_id = Grade::all()->unique()->random()->id;
        $students->class_id =Classes::all()->unique()->random()->id;
        $students->section_id = Section::all()->unique()->random()->id;
        $students->parent_id = myParent::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();
    }
}
