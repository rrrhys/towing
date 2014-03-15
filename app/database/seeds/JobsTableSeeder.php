<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class JobsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
    	
        $user = User::where('email','=','rrrhys@gmail.com')->first();
        $job_types = JobType::all();
        $car_types = array(
            ['Holden','Commodore'],
            ['Toyota','Corolla'],
            ['Ford','Falcon'],
            ['Ford','Fairlane'],
            ['Mazda','6'],
            ['Mazda','2'],
            ['Mazda','CX5'],
            ['Mazda','CX9'],
            ['BMW','135'],
            ['BMW','M3'],
            ['BMW','M5'],
            ['BMW','335i'],
            ['Subaru','WRX'],
            ['Subaru','Impreza'],
            ['Subaru','Liberty'],
            ['Subaru','Outback'],
            ['Subaru','Forester'],
            ['Toyota','Corolla'],
            ['Mazda','3']);
        foreach(range(1, 50) as $index)
        {
            $car_type = $car_types[rand(0, count($car_types) - 1)];
            $pickup = rand(0,1);
            $user_id = rand(1, count(User::all()));
            $user = User::find($user_id);
            $job = Job::create([
                'user_id' => $user_id,
                'top_user_id'=> $user->parent_id,
                'job_type_id'=> rand(1,count($job_types)),
                'job_number'=> rand(10000,99999),
                'vehicle_make'=> $car_type[0],
                'vehicle_model'=> $car_type[1],
                'pickup_postcode'=> rand(2000, 2999),
                'dropoff_postcode'=> rand(2000,2999),
                'pickup_address_id'=> -1,
                'dropoff_address_id'=> -1,
                'started_at'=> $faker->dateTimeBetween($startDate = '-5 days', $endDate = '-36 hours') ,
                'finishes_at'=> $faker->dateTimeBetween($startDate = '-36 hours', $endDate = '+3 days') ,
                'pickup_at'=> $pickup ? $faker->dateTimeBetween($startDate = '+1 day', $endDate = '+5 days') : null,
                'dropoff_at'=> $pickup ? null : $faker->dateTimeBetween($startDate = '+3 days', $endDate = '+6 days'),
                'current_bid'=> -1
                ]);
            $bids = rand(0,5);
            for($i = 0; $i < $bids;$i++){
                $bid = Bid::create();
                $bid->job_id = $job->id;
                $bid->amount = Rand(100.00,500.00);
            }

        }
    }

}