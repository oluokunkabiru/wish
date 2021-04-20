<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templatesetups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('category')->nullable();
            $table->json('image')->nullable();
            $table->json('music')->nullable();
            $table->json('video')->nullable();
            $table->integer('theme_id');
            $table->json('content')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('templatesetups');
    }
}