<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tags', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('bun_id');

            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('bun_id')->references('id')->on('buns');
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
        Schema::dropIfExists('product_tags');
    }
}
