<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pilot;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReferencePlan>
 */
class ReferencePlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'pilot_id' => function () {
                return Pilot::factory()->create()->id;
            },
            'plan_name' => Str::random(10),
            'plan_fee' => fake()->numberBetween($min = 1000, $max = 100000),
        ];
    }
}
