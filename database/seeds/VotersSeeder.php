<?php

use Illuminate\Database\Seeder;

class VotersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Classroom::class, 5)->create()->each(function ($classroom) {
            $classroom->voters()->saveMany(factory(App\Voter::class, 5)->make());
        });
    }
}
