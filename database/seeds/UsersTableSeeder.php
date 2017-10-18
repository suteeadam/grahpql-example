<?php

use App\Models\User;
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
    	$name = [
    		'Randy Vaughn',
    		'Christina Lambert',
    		'Doug Dawson',
    		'Ryan Mckenzie',
    		'Percy Ward',
    		'Chelsea Dennis',
    		'Conrad Turner',
    		'Felicia Simon',
    		'Jessica Abbott',
    		'Abel Stokes'
    	];

        for ($i = 0; $i < 10 ; $i++) {
        	$user = User::create([
        		'email' => str_random(10).'@gmail.com',
        		'password' => bcrypt('secret'),
        		'name' =>  $name[$i],
        		'code' => str_random(5),
        	]);

        }
    }
}
