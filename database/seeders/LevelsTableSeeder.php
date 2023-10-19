<?php

namespace Database\Seeders;

use App\Models\ClassLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

         ClassLevel::create([
            'name'=>'Kindergarden'
         ]);
         ClassLevel::create([
            'name'=>'Primary'
         ]);
         ClassLevel::create([
            'name'=>'Secondary'
         ]);
         ClassLevel::create([
            'name'=>'Tetiary'
         ]);

    }
}
