<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buns', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name',100);
            $table->string('file', 200);
            $table->text('description');
            $table->decimal('price',5,2);
            $table->decimal('price_discount',5,2)->nullable();

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
        Schema::dropIfExists('buns');
    }
}
