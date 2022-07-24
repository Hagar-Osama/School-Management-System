<?php

use App\Models\Blood;
use App\Models\myParent;
use App\Models\Nationality;
use App\Models\Religion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parents')->delete();
        $my_parents = new myParent();
        $my_parents->email = 'parent@gmail.com';
        $my_parents->password = Hash::make('12345678');
        $my_parents->father_name = ['en' => 'Yossef Mohamed', 'ar' => 'يوسف محمد'];
        $my_parents->father_national_id = '1234567810';
        $my_parents->father_passport_id = '1234567810';
        $my_parents->father_phone = '1234567810';
        $my_parents->father_job = ['en' => 'programmer', 'ar' => 'مبرمج'];
        $my_parents->father_nationality_id = Nationality::all()->unique()->random()->id;
        $my_parents->father_blood_id =Blood::all()->unique()->random()->id;
        $my_parents->father_religion_id = Religion::all()->unique()->random()->id;
        $my_parents->father_address ='القاهرة';
        $my_parents->mother_name = ['en' => 'Mai Ahmed', 'ar' => 'مي احمد'];
        $my_parents->mother_national_id = '1234567810';
        $my_parents->mother_passport_id = '1234567810';
        $my_parents->mother_phone = '1234567810';
        $my_parents->mother_job = ['en' => 'programmer', 'ar' => 'مبرمجة'];
        $my_parents->mother_nationality_id = Nationality::all()->unique()->random()->id;
        $my_parents->mother_blood_id =Blood::all()->unique()->random()->id;
        $my_parents->mother_religion_id = Religion::all()->unique()->random()->id;
        $my_parents->mother_address ='القاهرة';
        $my_parents->save();
    }
}
