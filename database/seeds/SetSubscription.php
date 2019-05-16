<?php

use Illuminate\Database\Seeder;

class SetSubscription extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=1; $i < 11; $i++) 
        {
            DB::table('subscriptions')->insert([
                'member_id' => $i,
                'membership_id' => rand(1,2),
            ]);
        }

    }
}
