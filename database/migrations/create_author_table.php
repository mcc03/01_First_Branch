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
        // creates the author table along with the appropriate columns
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('author_fname');
            $table->text('author_lname');
            $table->text('author_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
};