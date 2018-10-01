<?php

use Illuminate\Database\Seeder;

class ControlHorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\controlHorario::class, 1000)->create();
    }
}
