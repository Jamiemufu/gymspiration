<?php

use Illuminate\Database\Seeder;

class AdminUser extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('users')->insert([
			'username' => 'admin',
			'email' => env('ADMIN_EMAIL'),
			'password' => bcrypt(env('ADMIN_PASSWORD')),
		]);

		DB::table('role_user')->insert([
			'user_id' => 1,
			'role_id' => 1,
		]);

	}
}
