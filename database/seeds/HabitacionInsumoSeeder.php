<?php

use Illuminate\Database\Seeder;

class HabitacionInsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\HabitacionInsumo::class, 6000)->create();
    }
}
