<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Portfolio;
use app\Models\ReferencePlan;
use App\Models\User;
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
        //Userテーブル用 10人作成
        $users = User::factory(10)->create();


        //Pilotテーブル用 10人作成
        $pilots = Pilot::factory(10)->create();


        //Portfolio用ダミーデータ
        foreach ($pilots as $pilot) {
            $pilot->portfolios()->saveMany(Portfolio::factory()->count(3)->create(['pilot_id' => $pilot->id]));
        };


        //reference_plans用ダミーデータ
        foreach ($pilots as $pilot) {
            $pilot->reference_plans()->saveMany(ReferencePlan::factory()->count(2)->create(['pilot_id' => $pilot->id]));
        };

        //shooting_plans用ダミーデータ
        foreach ($pilots as $pilot) {
            $pilot->shooting_plans()->saveMany(ShootingPlan::factory()->count(1)->create(['pilot_id' => $pilot->id]));
        };
    }
}
