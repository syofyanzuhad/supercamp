<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DefaultTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        // $this->call(ParticipantTableSeeder::class);
    }
}
