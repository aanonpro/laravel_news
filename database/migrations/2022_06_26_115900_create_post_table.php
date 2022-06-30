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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('image_cover');
            $table->string('title');
            $table->string('slug');
            $table->string('short_title');
            $table->mediumText('Description');
            $table->string('yt_iframe')->nullable();
            $table->string('meta_title');
            $table->mediumText('meta_description')->nullable();
            $table->mediumText('meta_keyword')->nullable();

            $table->tinyInteger('status')->default('0');
            $table->integer('created_by');
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
        Schema::dropIfExists('post');
    }
};
