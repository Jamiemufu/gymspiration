<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('members', function (Blueprint $table) {
			$table->increments('id');
			$table->string('email');
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password')->nullable();
			$table->string('username')->nullable();
			$table->string('firstName');
			$table->string('lastName');
			$table->string('address_line_1');
			$table->string('address_line_2')->nullable();
			$table->string('town');
			$table->string('county');
			$table->string('postcode');
			$table->string('phone')->nullable();
			$table->date('DOB')->nullable();
			$table->unsignedInteger('membership_id')->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('members');
	}
}
