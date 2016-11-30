<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoteUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('note_id')->unsigned();
            $table->integer('permission');
            $table->primary(['user_id', 'note_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('note_id')->references('id')->on('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('note_user');
    }
}
