<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHolidaysTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Holidays', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->integer('fieild')->nullable();
            $table->string('select')->nullable();
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
        Schema::drop('Holidays');
    }
}
