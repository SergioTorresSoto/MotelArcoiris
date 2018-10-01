<?php

use Illuminate\Database\Seeder;

class UsuarioHabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UsuarioHabitacion::class, 2000)->create();
    }
}
