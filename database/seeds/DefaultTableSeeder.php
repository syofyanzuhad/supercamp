<?php

use Illuminate\Database\Seeder;

class DefaultTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classname')->insert(
            [
                ['classname' => 'Membuat Website Responsive'],
            ]
        );
        DB::table('mentor')->insert(
            [
                ['mentor' => 'Bagas'],
                ['mentor' => 'Rizqan'],
                ['mentor' => 'Wandi'],
                ['mentor' => 'Hafif'],
                ['mentor' => 'Amar'],
                ['mentor' => 'Dimas'],
                ['mentor' => 'Syofyan'],
            ]
        );
        DB::table('month')->insert(
            [
                ['month' => 'Januari'],
                ['month' => 'Februari'],
                ['month' => 'Maret'],
                ['month' => 'April'],
                ['month' => 'Mei'],
                ['month' => 'Juni'],
                ['month' => 'Juli'],
                ['month' => 'Agustus'],
                ['month' => 'September'],
                ['month' => 'November'],
                ['month' => 'Oktober'],
                ['month' => 'Desember'],
            ]
        );
        DB::table('status')->insert(
            [
                ['status' => 'Tersedia'],
                ['status' => 'Penuh'],
                ['status' => 'Segera'],
                ['status' => 'Belum Konfirmasi'],
                ['status' => 'Terkonfirmasi'],
                ['status' => 'Terdaftar'],
            ]
        );
        DB::table('date')->insert(
            [
                ['date' => '1'],
                ['date' => '2'],
                ['date' => '3'],
                ['date' => '4'],
                ['date' => '5'],
                ['date' => '6'],
                ['date' => '7'],
                ['date' => '8'],
                ['date' => '9'],
                ['date' => '10'],
                ['date' => '11'],
                ['date' => '12'],
                ['date' => '13'],
                ['date' => '14'],
                ['date' => '15'],
                ['date' => '16'],
                ['date' => '17'],
                ['date' => '18'],
                ['date' => '19'],
                ['date' => '20'],
                ['date' => '21'],
                ['date' => '22'],
                ['date' => '23'],
                ['date' => '24'],
                ['date' => '25'],
                ['date' => '26'],
                ['date' => '27'],
                ['date' => '28'],
                ['date' => '29'],
                ['date' => '30'],
                ['date' => '31'],
                ['date' => '1-3'],
                ['date' => '8-10'],
                ['date' => '15-17'],
                ['date' => '22-24'],
            ]
        );
        DB::table('duration')->insert(
            [
                ['duration' => '1 Hari'],
                ['duration' => '3 Hari'],
                ['duration' => '1 Bulan'],
                ['duration' => '3 Bulan'],
            ]
        );
    }
}
