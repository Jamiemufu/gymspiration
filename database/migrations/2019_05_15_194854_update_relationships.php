<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //set the relationships
         Schema::table('membership_type', function (Blueprint $table) {
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('membership_id')->references('id')->on('memberships');
        });

        Schema::table('members', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
