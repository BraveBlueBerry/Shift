<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unsigned();
            $table->integer('month')->unsigned();
            $table->integer('day')->unsigned();
            $table->integer('hours')->unsigned();

            $table->integer('category')->unsigned();
            $table->string('description');
            $table->integer('status')->unsigned();
            $table->integer('team')->nullable()->unsigned();
            $table->integer('user')->unsigned();

            $table->foreign('category')
                  ->references('id')
                  ->on('categories');

            $table->foreign('user')
                ->references('id')
                ->on('users');

            $table->foreign('team')
                  ->references('id')
                  ->on('teams');

            $table->foreign('status')
              ->references('id')
              ->on('statuses');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('registrations');
    }
}
