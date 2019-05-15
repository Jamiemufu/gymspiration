<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FakerUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //use faker to generate random users for testing

        $faker = Faker::create();

        //start at 2 to reserve admin id of 1
        
        for ($i=2; $i <= 11; $i++) 
        { 
	        DB::table('users')->insert([
	            'username' => $faker->username,
	            'email' => $faker->email,
	            'password' => bcrypt('secret'),
            ]);
            
            DB::table('role_user')->insert([
                'user_id' => $i,
                'role_id' => 2,
            ]);
	    }
    }
}
