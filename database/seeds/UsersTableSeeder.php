<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'department_id' => 1,
        	'police_unit_id' => 1,
        	'name' => 'Luis Miguel',
        	'last_name' => 'Rodriguez',
        	'cedula' => '708987030978',
        	'sexo' => 'm',
        	'email' => 'luis_miguel04@hotmail.es',
        	'password' => bcrypt('sannin'),
        	'rol' => 'admin'
        ]);
    }
}
