<?php

use App\Models\Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloods')->delete();
        
        $bloods = ['A-', 'B-', 'O-','O+', 'AB+', 'AB-', 'A+', 'B+'];

        foreach($bloods as $blood) {
            Blood::create([
                'name' => $blood,
            ]);
        }
    }
}
