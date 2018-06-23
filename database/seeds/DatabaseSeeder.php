<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoInsumoSeeder::class);
    	$this->call(UserTypeSeeder::class);
        $this->call(TiposProductosSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(Jornadas::class);
        $this->call(Proveedores::class);
    }
}
