<?php

use Illuminate\Database\Seeder;

class ProveedoresProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(App\DetalleCompra::class, 50)->create();
          factory(App\ProveedorProducto::class,150)->create();
    }
}
