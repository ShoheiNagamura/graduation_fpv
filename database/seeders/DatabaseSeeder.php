<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Portfolio;
use app\Models\ReferencePlan;
use App\Models\Pilot;
use App\Models\ShootingPlan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Userテーブル用
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Pilotテーブル用
        // \App\Models\Pilot::factory(10)->create();


        //Portfolioテーブル用
        // \App\Models\Portfolio::factory(10)->create();


        //PilotとPortfolioを紐づけてデータを作成
        Pilot::factory()->count(10)->create()->each(function ($pilot) {
            $pilot->portfolios()->saveMany(Portfolio::factory()->count(3)->create(['pilot_id' => $pilot->id]));
            $pilot->reference_plans()->saveMany(ReferencePlan::factory()->count(2)->create(['pilot_id' => $pilot->id]));
            $pilot->shooting_plans()->saveMany(ShootingPlan::factory()->count(1)->create(['pilot_id' => $pilot->id]));
        });
    }
}
