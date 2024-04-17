<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassType::create([
            'name'=>'Yoga',
            'description'=>fake()->text(),
            'minutes'=>15,
        ]);
        ClassType::create([
            'name'=>'Box',
            'description'=>fake()->text(),
            'minutes'=>20,
        ]);
        ClassType::create([
            'name'=>'Running',
            'description'=>fake()->text(),
            'minutes'=>25,
        ]);
        ClassType::create([
            'name'=>'Foot',
            'description'=>fake()->text(),
            'minutes'=>51,
        ]);
        ClassType::create([
            'name'=>'Having',
            'description'=>fake()->text(),
            'minutes'=>30,
        ]);
    }
}
