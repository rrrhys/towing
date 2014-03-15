<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $user = User::create(array(
            'email'=>'boss@gmail.com',
            'password'=>Hash::make('boss'),
            'parent_id'=>0,
            'is_corporate'=>1,
            'is_lister'=>1
            ));
    	$user = User::create(array(
    		'email'=>'rrrhys@gmail.com',
    		'password'=>Hash::make('insecure_pass'),
            'is_admin'=>1,
            'is_lister'=>1,
            'parent_id'=>1
    		));
        $user = User::create(array(
            'email'=>'coworker@gmail.com',
            'password'=>Hash::make('coworker'),
            'parent_id'=>1,
            'is_lister'=>1
            ));
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            User::create([
            	'email'=>$faker->email,
            	'password'=>Hash::make($faker->word),
                'parent_id'=>0
            ]);
        }
    }

}