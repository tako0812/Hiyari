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
        $this->call([
            UsersTableSeeder::class,
            WorkSeeder::class,
            HiyarisTableSeeder::class,
            JobsTableSeeder::class,
            AgeTableSeeder::class,
            OperationsTableSeeder::class,
            TrainsTableSeeder::class,
            WeekTableSeeder::class,
        ]);
    }
}
