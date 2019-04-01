<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Seeder para pobar tabla
         * Ejemplo: Poblar ciudades, estados, pruebas, etc.
         */
        $cant = 20;
        for($i=0; $i < $cant; $i++)
        {
            DB::table('projects')->insert(array(
                'name' => 'Proyecto ' . $i,
                'description' => 'Descripcion de proyecto '. $i,
                'status' => 'ACTIVO',
                'start_date' => date('Y-m-d')
            ));
        }

    }
}