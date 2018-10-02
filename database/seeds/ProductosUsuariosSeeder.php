<?php

use Illuminate\Database\Seeder;

class ProductosUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(App\DetalleVenta::class, 25)->create();
          factory(App\ProductoUsuario::class,150)->create();
    }
}
