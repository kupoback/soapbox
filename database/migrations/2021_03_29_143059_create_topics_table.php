<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->unsignedBigInteger('created_by'); // ID of the user who created the topic
            $table->string('topic_status');
            $table->string('priority_status');
            $table->integer('list_order'); // Order the topic appears in the team list
            $table->boolean('request_delete'); // Whether the item should marked to delete
            $table->boolean('archived'); // If the topic_status is closed, mark it for archive
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
        Schema::dropIfExists('topics');
    }
}
