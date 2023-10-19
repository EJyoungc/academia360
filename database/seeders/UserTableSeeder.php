<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Systems Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('root'),
            // 'mobile' => '265884348727',
            'role' =>'system'
        ]);
        User::create([
            'name' => 'Abbey',
            'email' => 'head@gmail.com',
            'password' => Hash::make('root'),
            // 'mobile' => '265884348727',
            'role' => 'admin'
        ]);
        // User::create([
        //     'name' => 'Abbey',
        //     'email' => 'teacher@gmail.com',
        //     'password' => Hash::make('root'),
        //     'mobile' => '265884348727',
        //     'role_id' => 'teacher'
        // ]);
        // User::create([
        //     'name' => 'Jerry',
        //     'email' => 'rent@gmail.com',
        //     'password' => Hash::make('root'),
        //     'mobile' => '265884348727',
        //     'role_id' => 'par'

        // ]);
        // User::create([
        //     'name' => 'Benard',
        //     'email' => 'u2@gmail.com',
        //     'password' => Hash::make('root'),
        //     'role_id' => 'parent'
        // ]);
        // User::create([
        //     'name' => 'Ruth',
        //     'email' => 'u2@gmail.com',
        //     'password' => Hash::make('root'),
        //     'role_id' => 'parent'
        // ]);
    }
}
