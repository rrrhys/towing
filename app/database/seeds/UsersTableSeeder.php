<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	$user = User::create(array(
    		'email'=>'rrrhys@gmail.com',
    		'password'=>Hash::make('insecure_pass')
    		));
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            User::create([
            	'email'=>$faker->email,
            	'password'=>Hash::make($faker->word)
            ]);
        }
    }

}