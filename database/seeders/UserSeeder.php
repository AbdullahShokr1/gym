<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(5)->create();
        User::factory()->count(5)->create(['role'=>'instructor']);
        User::factory()->count(5)->create(['role'=>'admin']);
        User::factory()->create([
            'name' => 'Abdullah',
            'email' => 'abdullah@test.com',
            'role'=>'member',
        ]);
        User::factory()->create([
            'name' => 'Instructor',
            'email' => 'instructor@test.com',
            'role'=>'instructor',
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'role'=>'admin',
        ]);
    }
}
