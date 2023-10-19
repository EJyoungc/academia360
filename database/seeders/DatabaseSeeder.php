<?php

use App\User;
use Database\Seeders\LevelsTableSeeder;
use Database\Seeders\RoleTableSeeder;
use Database\Seeders\UserTableSeeder;
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
        
        $this->call(UserTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        // $this->call(RoleTableSeeder::class);
    }
}
