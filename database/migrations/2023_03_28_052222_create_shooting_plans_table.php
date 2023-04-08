<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shooting_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pilot_id'); //外部キー
            $table->string('plan_name');
            $table->string('plan_detail', 500);
            $table->integer('plan_fee');
            $table->string('application_date'); //申込日
            $table->string('shooting_date'); //撮影日
            $table->string('delivery_date'); //納品日
            $table->timestamps();


            //外部キーの制約
            $table->foreign('pilot_id')->references('id')->on('pilots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shooting_plans');
    }
};
