<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('role');
            $table->string('picture_id');
            $table->string('city')->nullable();
            $table->string('gender')->nullable();

            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('provider');
            $table->string('provider_id');
            $table->string('dob')->nullable();
            $table->integer('online_status');
            $table->timestamp('last_login_at');
            $table->string('active_status');

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
        Schema::dropIfExists('users');
    }
}
