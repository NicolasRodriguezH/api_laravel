<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
        	[
	        	'names' => 'Alex Oscar',
	        	'surnames' => 'Gamarra Solis',
	        	'age' => '28',
	        	'sex' => 'Masculino',
	        	'cedula' => '70218511',
	        	'tipo_sangre' => 'A+',
	        	'cel' => '943124351',
	        	'email' => 'alex@gmail.com',
	        	'addres' => 'Jr. Ramón Castilla 110'
        	],
        	[
	        	'names' => 'María Perla',
	        	'surnames' => 'Saruc Main',
	        	'age' => '34',
	        	'sex' => 'Femenino',
	        	'cedula' => '80218522',
	        	'tipo_sangre' => 'A-',
	        	'cel' => '952312435',
	        	'email' => 'maria@gmail.com',
	        	'addres' => 'Jr. Manuel Ruíz 230'
        	],
        	[
	        	'names' => 'Julio Ramón',
	        	'surnames' => 'Quiroga Hasher',
	        	'age' => '52',
	        	'sex' => 'Masculino',
	        	'cedula' => '23219913',
	        	'tipo_sangre' => 'A+',
	        	'cel' => '977123331',
	        	'email' => 'julio@gmail.com',
	        	'addres' => 'Jr. Enrique Palacios 202'
        	],
        	[
        		'names' => 'Mario Idalgo',
				'surnames' => 'Cuerbo Nieto',
				'age' => '18',
				'sex' => 'Masculino',
				'cedula' => '80218511',
				'tipo_sangre' => 'B+',
				'cel' => '932112351',
				'email' => 'mario@gmail.com',
				'addres' => 'Jr. Manuel Ruiz 800'
        	],
        	[
        		'names' => 'María Rosa',
        		'surnames' => 'Jara Uri',
				'age' => '40',
				'sex' => 'Femenino',
				'cedula' => '62215777',
				'tipo_sangre' => 'AB+',
				'cel' => '951774351',
				'email' => 'maría@gmail.com',
				'addres' => 'Jr. Ramón Castilla 401'
        	],
        	[
        		'names' => 'Kevin Juan',
				'surnames' => 'Rodriguez Ezquivel',
				'age' => '49',
				'sex' => 'Masculino',
				'cedula' => '78218555',
				'tipo_sangre' => 'A+',
				'cel' => '934994351',
				'email' => 'kevin@gmail.com',
				'addres' => 'Jr. Alfonso Ugarte 2020'
        	],
        ]);
    }
}
