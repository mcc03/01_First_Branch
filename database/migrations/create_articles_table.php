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
        // creates the article table along with the appropriate columns
        // one user can have many articles
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->text('title');
            $table->text('author');
            $table->text('body_text');
            $table->integer('category_id');
            $table->string('article_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
