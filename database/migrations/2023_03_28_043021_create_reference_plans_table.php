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
        Schema::create('reference_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pilot_id'); //外部キー
            $table->string('plan_name');
            $table->integer('plan_fee');
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
        Schema::dropIfExists('reference_plans');
    }
};
