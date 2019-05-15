<?php

use Illuminate\Database\Seeder;

class MembershipTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memberships')->insert([
            'type' => 'monthly',
            'price' => 14.99,
        ]);

        DB::table('memberships')->insert([
            'type' => 'annualy',
            'price' => 99.99,
        ]);
    }
}

