<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // creates the comments table along with the appropriate columns, this would be for a many to many relationship
        // many users can comment on many articles
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('user_id');
            $table->text('article_id');
            $table->text('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};