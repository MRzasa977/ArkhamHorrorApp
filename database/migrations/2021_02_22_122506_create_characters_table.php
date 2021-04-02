<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('start');
            $table->string('skill');
            $table->integer('sanity');
            $table->integer('stamina');
            $table->integer('focus');
            $table->integer('max_speed');
            $table->integer('min_speed');
            $table->integer('max_sneak');
            $table->integer('min_sneak');
            $table->integer('max_fight');
            $table->integer('min_fight');
            $table->integer('max_will');
            $table->integer('min_will');
            $table->integer('max_lore');
            $table->integer('min_lore');
            $table->integer('max_luck');
            $table->integer('min_luck');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
