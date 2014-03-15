<?php

class JobTypesTableSeeder extends Seeder {

    public function run()
    {

            JobType::create([
            	'name'=>'< 4T'
            ]);
            JobType::create([
                'name'=>'> 4T'
            ]);
            JobType::create([
                'name'=>'Boat'
            ]);
    }

}