<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceToTours extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('tours', 'photo'))
        {
            //Add 'price' column
            Schema::table('tours', function(Blueprint $table) {
                $table->float('price')->nullable()->after('attendee_id');
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
        if (Schema::hasColumn('tours', 'price'))
        {
            //Drop 'price' column
            Schema::table('tours', function(Blueprint $table) {
                $table->dropColumn('price');
            });
        }
    }

}
