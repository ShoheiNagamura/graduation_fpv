<?php

namespace Database\Factories;

use app\Models\Pilot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
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
            'portfolio_url' => fake()->imageUrl(), //追記

        ];
    }
}
