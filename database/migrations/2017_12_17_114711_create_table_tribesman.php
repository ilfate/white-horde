<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTribesman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('white_tribesman', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tribe_id')->nullable()->unsigned();
            $table->string('name', 40)->nullable();
            $table->integer('age')->default(0)->unsigned();
            $table->text('data')->nullable();
            $table->text('traits')->nullable();
            $table->text('items')->nullable();
            $table->text('decks')->nullable();
            $table->boolean('is_alive')->default(true);
            $table->boolean('gender')->default(true);
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
        Schema::dropIfExists('white_tribesman');
    }
}
