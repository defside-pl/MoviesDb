<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('movies', function(Blueprint $table)
        {
           $table->increments('id');
           $table->string('title')->nullable();
           $table->string('year')->nullable();
           $table->string('rating')->nullable();
           $table->string('genre')->nullable();
           $table->text('plotoutline')->nullable();
           $table->text('photoThumb')->nullable();
           $table->string('t_url')->default('');
           $table->timestamp('published_at')->nullable();
           $table->boolean('published')->default(false);
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
        Schema::dropIfExists('movies');
    }
}
