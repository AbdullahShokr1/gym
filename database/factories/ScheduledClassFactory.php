<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ScheduledClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'instructor_id'=>rand(1,18),
            'class_type_id'=>rand(1,5),
            'date_time'=>Carbon::now()->addHours(rand(24,120))->minutes(0)->seconds(0),
        ];
    }
}
