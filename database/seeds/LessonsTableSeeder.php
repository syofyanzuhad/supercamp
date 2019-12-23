<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 12; $i++) { 
                DB::table('lessons')->insert(
                    [
                        [   
                            'subject' => '1',
                            'class_wave' => '1',
                            'class_date' => '1',
                            'class_month' => $i,
                            'class_year' => '2020',
                            // change duration for each class
                            // and switch off users seeder
                            'class_duration' => '1'
                        ],                       
                        [   
                            'subject' => '1',
                            'class_wave' => '2',
                            'class_date' => '8',
                            'class_month' => $i,
                            'class_year' => '2020',
                            // change duration for each class
                            // and switch off users seeder
                            'class_duration' => '1'
                        ],
                        [   
                            'subject' => '1',
                            'class_wave' => '3',
                            'class_date' => '15',
                            'class_month' => $i,
                            'class_year' => '2020',
                            // change duration for each class
                            // and switch off users seeder
                            'class_duration' => '1'
                        ],
                        [   
                            'subject' => '1',
                            'class_wave' => '4',
                            'class_date' => '22',
                            'class_month' => $i,
                            'class_year' => '2020',
                            // change duration for each class
                            // and switch off users seeder
                            'class_duration' => '1'
                        ],
                    ]
                );
        };
    }
}
