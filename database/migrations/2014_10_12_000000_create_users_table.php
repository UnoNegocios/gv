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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last')->nullable();
            $table->string('type')->nullable();
            $table->string('email')->unique();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->json('bookmarked_posts')->nullable();
            $table->date('birthdate')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            $table->bigInteger('origin_id')->unsigned()->nullable();
            $table->foreign('origin_id')->references('id')->on('origins')
            ->onDelete('set null')
            ->onUpdate('set null');

            $table->bigInteger('segment_id')->unsigned()->nullable();
            $table->foreign('segment_id')->references('id')->on('segments')
            ->onDelete('set null')
            ->onUpdate('set null');

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
        Schema::dropIfExists('users');
    }
};
