<?php

use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religions = [
            [
                'en' => 'Muslim',
                'ar' => 'مسلم'
            ],
            [
                'en' => 'Christian',
                'ar' => 'مسيحي'

            ],
            [
                'en' => 'Jewish',
                'ar' => 'يهودي'
            ],
            [
                'en'=> 'Others',
                'ar'=> 'غيرذلك'
            ],
        ];

        foreach($religions as $religion) {
              Religion::create(['name' => $religion]);
        }
    }
}
