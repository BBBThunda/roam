<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_guide_id');
            $table->integer('tour_type_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('latitude');
            $table->integer('longitude');
            $table->integer('attendee_id')->nullable();
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
        Schema::drop('tours');
    }

}
