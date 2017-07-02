<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->unsigned();
            $table->integer('team')->unsigned();

            $table->string('message');

            $table->timestamps();

            $table->foreign('team')
                  ->references('id')
                  ->on('teams');

            $table->foreign('user')
                  ->references('id')
                  ->on('users');
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
        Schema::dropIfExists('invitations');
    }
}
