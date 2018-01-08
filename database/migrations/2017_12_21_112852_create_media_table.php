<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('slug',191)->unique();
            $table->string('caption');
            $table->string('url');
            $table->text('description')->nullable();
            $table->enum('category', ['designs', 'photos']);
            $table->boolean('visibility')->default('1');
            $table->integer('album_id')->nullable();
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
        Schema::dropIfExists('media');
    }
}
