<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsGuideToUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'is_guide'))
        {
            //Add 'is_guide' column
            Schema::table('users', function(Blueprint $table) {
                $table->boolean('is_guide')->after('')->default(false);
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
        if (Schema::hasColumn('users', 'is_guide'))
        {
            //Drop 'is_guide' column
            Schema::table('users', function(Blueprint $table) {
                $table->dropColumn('enabled');
            });
        }
    }

}
