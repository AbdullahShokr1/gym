<?php

namespace Database\Seeders;

use App\Models\ScheduledClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScheduledClass::factory()->count(10)->create();
    }
}
