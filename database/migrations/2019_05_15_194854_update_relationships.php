<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRelationships extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		Schema::table('role_user', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
			$table->foreign('role_id')->references('id')->on('roles');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}
}
