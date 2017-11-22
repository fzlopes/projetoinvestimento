<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'cpf'      => '454659959',
    		'name'     => 'Fábio',
    		'phone'    => '32251005',
    		'birth'    => '1987-10-11',
    		'gender'   => 'M',
    		'email'    => 'fabio@sistema.com',
            'password' => env("PASSWORD_HASH") ? bcrypt('123456') : '123456',

    		]);
        
    }
}
