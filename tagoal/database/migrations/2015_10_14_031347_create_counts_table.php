<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('countable_id')->index();
            $table->string('countable_type');
            $table->text('body');
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
        Schema::drop('counts');
    }
}
