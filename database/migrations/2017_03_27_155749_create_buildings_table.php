<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->tinyInteger('city')->unsigned();
            $table->double('price');
            $table->tinyInteger('rooms')->unsigned;
            $table->tinyInteger('rent');
            $table->double('area');
            $table->integer('type')->unsigned();
            $table->string('short_description', 160);
            $table->string('meta');
            $table->double('longitude');
            $table->double('latitude');
            $table->text('full_description');
            $table->boolean('status');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
