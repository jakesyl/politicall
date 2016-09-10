<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone');
            $table->string('name')->default('');
            $table->string('opinion')->default('');
            $table->boolean('donated')->default(0);
            $table->boolean('toCall')->default(0);;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }
}
