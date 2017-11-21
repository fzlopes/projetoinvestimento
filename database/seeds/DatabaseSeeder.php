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
    		'cpf'      => '12345678990',
    		'name'     => 'João',
    		'phone'    => '32251005',
    		'birth'    => '1980-10-01',
    		'gender'   => 'M',
    		'email'    => 'joao@sistema.com',
            'password' => bcrypt('123456')

    		]);
        // $this->call(UsersTableSeeder::class);
    }
}
