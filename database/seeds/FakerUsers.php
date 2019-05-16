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

        $faker = Faker::create('en_GB');
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

            DB::table('members')->insert([
                'user_id' => $i,
                'firstName' => $faker->firstname,
                'lastName' => $faker->lastname,
                'email' => $faker->email,
                'address_line_1' => $faker->streetaddress,
                'town' => $faker->city,
                'county' => $faker->county,
                'postcode' => $faker->postcode,
                'phone' => $faker->phonenumber,
                'DOB' => $faker->date,
                'created_at' => $faker->date,
                'membership_id' => rand(1,2),
            ]);

	    }
    }
}
