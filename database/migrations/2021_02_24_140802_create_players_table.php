<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('character_id')->nullable();
            $table->foreign('character_id')->references('id')
            ->on('characters')->onDelete('cascade');
            $table->integer('sanity');
            $table->integer('stamina');
            $table->integer('speed');
            $table->integer('sneak');
            $table->integer('fight');
            $table->integer('will');
            $table->integer('lore');
            $table->integer('luck');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
