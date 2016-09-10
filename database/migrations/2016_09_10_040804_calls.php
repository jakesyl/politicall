<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Calls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('calls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('callerId');
            $table->string('duration')->default('');
            $table->boolean('pickup')->default(0);
            $table->string('name')->default('');
            $table->string('opinion')->default('Neutral');
            $table->string('phone')->default('');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('calls');
    }
}
