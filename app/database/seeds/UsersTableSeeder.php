<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        $user = User::create(array(
            'email'=>'boss@gmail.com',
            'password'=>Hash::make('insecure_pass'),
            'parent_id'=>0,
            'is_corporate'=>1,
            'is_lister'=>1,
            'username'=>'boss'
            ));
        $user->user_details()->save($this->get_user_detail());
    	$user = User::create(array(
    		'email'=>'rrrhys@gmail.com',
    		'password'=>Hash::make('insecure_pass'),
            'is_admin'=>1,
            'is_lister'=>1,
            'parent_id'=>1,
            'username'=>'rrrhys_lister'
    		));

        $user->user_details()->save($this->get_user_detail());

        $user = User::create(array(
            'email'=>'coworker@gmail.com',
            'password'=>Hash::make('insecure_pass'),
            'parent_id'=>1,
            'is_lister'=>1,
            'username'=>'coworker'
            ));
        $user->user_details()->save($this->get_user_detail());
        $user = User::create(array(
            'email'=>'rrrhys_tower@gmail.com',
            'password'=>Hash::make('insecure_pass'),
            'is_admin'=>0,
            'is_lister'=>0,
            'is_tower'=>1,
            'username'=>'rrrhys_tower'
            ));
        $user->user_details()->save($this->get_user_detail());

        foreach(range(1, 10) as $index)
        {
            User::create([
            	'email'=>$faker->email,
            	'password'=>Hash::make($faker->word),
                'parent_id'=>0,
                'is_tower'=>1,
                'username'=>$faker->name
            ]);
        $user->user_details()->save($this->get_user_detail());
        }
    }
    public function get_user_detail(){
        $faker = Faker::create();
                return new UserDetail(array(
            'contact_number_1'=>$faker->phoneNumber, 
            'contact_number_2'=>$faker->phoneNumber, 
            'company_trading_name'=>$faker->company,
            'contact_first_name'=>$faker->firstName, 
            'address_line_1'=>$faker->streetAddress,
            'suburb'=>$faker->city,
            'state'=>$faker->state,
            'postcode'=>$faker->postcode));
    }

}