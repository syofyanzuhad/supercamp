<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ParticipantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i=1; $i < 11; $i++) { 
        DB::table('participants')->insert(
            [
                'id_number' => '3302182201991234',
                'name' => 'Syofyan Zuhad',
                'image' => 'syofyan',
                'phone' => '6281326743694',
                'email' => 'syofyan@zuhad.com',
                'city' => 'Purwokerto',
                'address' => 'Banyumas',
                'birth_place' => 'Banyumas',
                'birth_date' => '22011999',
                'class' => 1,
                'class_date' => 1,
                'class_month' => 1,
                'class_year' => 2020,
                't_shirt' => 'M',
            ]
        );
    // }
    }
}
