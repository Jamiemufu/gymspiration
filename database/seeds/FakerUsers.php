<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class FakerUsers extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//use faker to generate random users for testing

		$faker = Faker::create('en_GB');

		for ($i = 1; $i <= 10; $i++) {

			DB::table('members')->insert([
				'firstName' => $faker->firstname,
				'lastName' => $faker->lastname,
				'email' => $faker->email,
				'username' => $faker->username,
				'password' => bcrypt('secret'),
				'username' => $faker->username,
				'address_line_1' => $faker->streetaddress,
				'town' => $faker->city,
				'county' => $faker->county,
				'postcode' => $faker->postcode,
				'phone' => $faker->phonenumber,
				'DOB' => $faker->date,
				'created_at' => $faker->date,
				'membership_id' => rand(1, 2),
			]);

			DB::table('role_user')->insert([
				'member_id' => $i,
				'role_id' => 2,
			]);

		}
	}
}
