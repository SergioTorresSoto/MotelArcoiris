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
	    $this->call(Insumos::class);
        $this->call(TipoHabitacionesSeeder::class);
        $this->call(EstadoHabitacionesSeeder::class);
        $this->call(ProductosSeeder::class);
        $this->call(Habitaciones::class);
        $this->call(TipoServicioSeeder::class);
        $this->call(TarifasSeeder::class);
        $this->call(ControlHorarioSeeder::class);
        $this->call(UserJornadaSeeder::class);
        $this->call(UsuarioHabitacionSeeder::class);
        $this->call(HabitacionInsumoSeeder::class);
        $this->call(ProveedoresProductosSeeder::class);
        $this->call(ProveedoresInsumosSeeder::class);
        $this->call(ProductosUsuariosSeeder::class);
    }
}
