<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionToTours extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('tours', 'description'))
        {
            //Add 'description' column
            Schema::table('tours', function(Blueprint $table) {
                $table->boolean('description')->after('attendee_id');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('tours', 'description'))
        {
            //Drop 'description' column
            Schema::table('tours', function(Blueprint $table) {
                $table->dropColumn('description');
            });
        }
    }

}
