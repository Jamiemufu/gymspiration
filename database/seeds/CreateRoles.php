<?php

use Illuminate\Database\Seeder;

class CreateRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([

            ['name' => 'admin', 'description' => 'admin role'],
            ['name' => 'member', 'description' => 'member role']

        ]);
    }
}
