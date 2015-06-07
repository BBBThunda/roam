<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameDescriptionToTours extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('tours', 'name') 
            || !Schema::hasColumn('tours', 'description'))
        {
            //Add 'description' column
            Schema::table('tours', function(Blueprint $table) {
                $table->string('name')->after('attendee_id');
                $table->string('description')->after('attendee_id');
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
        if (Schema::hasColumn('tours', 'name')) {
            //Drop 'name' column
            Schema::table('tours', function(Blueprint $table) {
                $table->dropColumn('name');
            });
        }
        if (Schema::hasColumn('tours', 'description'))
        {
            //Drop 'description' column
            Schema::table('tours', function(Blueprint $table) {
                $table->dropColumn('description');
            });
        }
    }

}
