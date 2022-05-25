<?php

use App\Models\Info;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infos')->delete();
       $infos = [
        [
            'key' => 'school_name',
            'value' => 'British School'

        ],
        [
            'key' => 'school_abbrev',
            'value' => 'BS'

        ],
        [
            'key' => 'school_address',
            'value' => 'new cairo'
        ],
        [
            'key' => 'logo',
            'value' => ''
        ],
        [
            'key' => 'email',
            'value' => 'school@gmail.com'
        ],
        [
            'key' => 'phone',
            'value' => '12345678'
        ],
        [
            'key' => 'current_year',
            'value' => '2022-2023'
        ],
        [
            'key' => 'first_semester_end_date',
            'value' => '25-1-2022'
        ],
        [
            'key' => 'second_semester_end_date',
            'value' => '30-6-2022'
        ],

    ];
            
            foreach($infos as $info) {
            Info::create([
                'key' => $info['key'],
                'value' => $info['value']
            ]);
        }
    }
}
