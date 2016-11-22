<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_notes', function (Blueprint $table) {
            $table->integer('group_id')->unsigned();
            $table->integer('note_id')->unsigned();
            $table->integer('permission');
            $table->primary(['group_id', 'note_id']);
            $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::drop('groups_notes');
    }
}
