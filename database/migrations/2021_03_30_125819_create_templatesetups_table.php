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
            $table->text('category')->nullable();
            $table->text('image')->nullable();
            $table->text('music')->nullable();
            $table->text('video')->nullable();
            $table->integer('theme_id');
            $table->text('content')->nullable();
            $table->text('user_id');
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