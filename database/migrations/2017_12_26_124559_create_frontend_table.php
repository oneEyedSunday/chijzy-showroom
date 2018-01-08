<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontends', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('img_src')->default('images/carousel/girl-bg.jpg');
            $table->string('img_alt')->default('Image not found, error');
            $table->string('heading')->default('Headline');
            $table->text('text_body');
            $table->string('link_text')->default('Describe link');
            $table->string('link_ref')->default('#');
            $table->tinyInteger('position')->unsigned();
            $table->boolean('visible')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontends');
    }
}
