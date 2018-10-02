<?php

use Illuminate\Database\Seeder;

class UserJornadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\userJornada::class, 50)->create();
    }
}
