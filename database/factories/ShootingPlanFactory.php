<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Pilot;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShootingPlan>
 */
class ShootingPlanFactory extends Factory
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
            'plan_detail' => Str::random(500),
            'plan_fee' => fake()->numberBetween($min = 1000, $max = 100000),
            'application_date' => Carbon::create(
                rand(1900, 2100), // 年
                rand(1, 12),      // 月
                rand(1, 28),      // 日
                0,                // 時
                0,                // 分
                0                 // 秒
            )->format('Y/m/d'),
            'shooting_date' => Carbon::create(
                rand(1900, 2100), // 年
                rand(1, 12),      // 月
                rand(1, 28),      // 日
                0,                // 時
                0,                // 分
                0                 // 秒
            )->format('Y/m/d'),
            'delivery_date' => Carbon::create(
                rand(1900, 2100), // 年
                rand(1, 12),      // 月
                rand(1, 28),      // 日
                0,                // 時
                0,                // 分
                0                 // 秒
            )->format('Y/m/d'),
        ];
    }
}
