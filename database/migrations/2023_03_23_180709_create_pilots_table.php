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
        Schema::create('pilots', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('user_image')->nullable(); //ユーザー画像（追記）
            $table->integer('age')->nullable(); //年齢（追記）
            $table->string('work_area', 255)->nullable(); //都道府県（追記）
            $table->string('message_pr', 500)->nullable(); //PRメッセージ（追記）
            $table->string('achievement', 500)->nullable(); //実績など（追記）
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilots');
    }
};
