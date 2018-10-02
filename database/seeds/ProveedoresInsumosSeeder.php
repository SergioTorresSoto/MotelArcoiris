<?php

use Illuminate\Database\Seeder;

class ProveedoresInsumosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProveedorInsumo::class,150)->create();
    }
}
