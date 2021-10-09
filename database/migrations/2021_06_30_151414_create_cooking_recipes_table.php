<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCookingRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooking_recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('region');
            $table->float('notation')->nullable(true);
            $table->integer('number_notations')->default(0);
            $table->longText('instructions');
            $table->time('duration');
            $table->string('image');
            $table->integer('number_persons');
            $table->string('type')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('cooking_recipes');
    }
}
