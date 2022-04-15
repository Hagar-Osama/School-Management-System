<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $specializations = [
            [
                'en' => 'Math',
                'ar' => 'رياضيات'
            ],
            [
                'en' => 'English',
                'ar' => 'انجليزي'
            ],
            [
                'en' => 'Arabic',
                'ar' => 'عربي'
            ],
            [
                'en' => 'French',
                'ar' => 'فرنساوي'
            ],
            [
                'en' => 'Chemistry',
                'ar' => 'كيمياء'
            ],
            [
                'en' => 'History',
                'ar' => 'تاريخ'
            ],
            [
                'en' => 'Geography',
                'ar' => 'جغرافيا'
            ],
            [
                'en' => 'Physics',
                'ar' => 'فيزياء'
            ],
            [
                'en' => 'Biology',
                'ar' => 'احياء'
            ]
        ];
        foreach($specializations as $spec){
            Specialization::create([
                'name' => $spec
            ]);
        }

    }
}
