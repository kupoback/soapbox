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
            $table->unsignedBigInteger('team_id');
            $table->string('title');
            $table->unsignedBigInteger('created_by'); // ID of the user who created the topic
            $table->unsignedBigInteger('status_id');
            $table->longText('description');
            $table->string('priority_status');
            $table->integer('list_order'); // Order the topic appears in the team list
            $table->boolean('request_delete')->nullable(); // Whether the item should marked to delete
            $table->boolean('archived')->nullable(); // If the topic_status is closed, mark it for archive
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
