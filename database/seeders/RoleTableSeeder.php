<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        UserRole::create([
            'name' => 'Admin'
        ]);
        UserRole::create([
            'name' => 'Head Master'
        ]);
        UserRole::create([
            'name' => 'Teacher'
        ]);
        UserRole::create([
            'name' => 'Parent'
        ]);
        UserRole::create([
            'name' => 'Librarian'
        ]);
    }
}
