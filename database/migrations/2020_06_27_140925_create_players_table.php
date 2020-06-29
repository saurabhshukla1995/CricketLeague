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
        if(! Schema::hasTable('players')) {
             Schema::create('players', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('teamId')->unsigned();
                $table->foreign('teamId')->references('id')->on('teams')->onDelete('cascade');
                $table->string('firstName');
                $table->string('lastName')->nullable();
                $table->string('imageUri')->nullable();
                $table->integer('playerJerNo')->nullable();
                $table->string('country');
                $table->text('playerHistory');
                $table->timestamps();
                $table->softDeletes();
            });
        }
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
