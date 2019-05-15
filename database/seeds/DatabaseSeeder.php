<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //call CreateRoles first
        $this->call(CreateRoles::class);
        $this->call(AdminUser::class);
        $this->call(FakerUsers::class);
        $this->call(MembershipTypes::class);
    }
}
