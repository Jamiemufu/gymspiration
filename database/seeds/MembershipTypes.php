<?php

use Illuminate\Database\Seeder;

class MembershipTypes extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('memberships')->insert([
			'type' => 'Monthly',
			'price' => 14.99,
		]);

		DB::table('memberships')->insert([
			'type' => 'Annualy',
			'price' => 99.99,
		]);

		DB::table('memberships')->insert([
			'type' => 'No Membership',
			'price' => 0,
		]);
	}
}
