<?php

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

    	$name = [
    		'Thai',
            'Math',
            'English',
            'Sci',
            'Computer',
            'Art'
    	];

        for ($i = 0; $i < 6 ; $i++) {
        	$subject = Subject::create([
        		'name' => $name[$i],
                'code' => str_random('5'),
                'detail' => 'test'
        	]);

            $user =  User::inRandomOrder()->first();
            if ($i < 3) {
                $type = 'student';
            } else {
                $type = 'teacher'; 
            }

            $subject->user()->attach($user, ['type' => $type]);
            
        }
    }
}
