<?php

use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            ['nome'=>'ADS', 'duracao'=>5],
            ['nome'=>'Direito', 'duracao'=>8],
            ['nome'=>'Enfermagem', 'duracao'=>5],
            ['nome'=>'Redes de Computador', 'duracao'=>5],
            ['nome'=>'Medicina', 'duracao'=>10],
        ]);
    }
}
