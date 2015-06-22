<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPhotoTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_photo', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('extension');
            $table->timestamps();
        });

        if (!Schema::hasColumn('users', 'profile_photo_id'))
        {
            //Add 'profile_photo_id' column
            Schema::table('users', function(Blueprint $table) {
                $table->integer('profile_photo_id')->after('is_guide')
                    ->nullable();
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
        Schema::drop('user_photo');

        if (Schema::hasColumn('users', 'profile_photo_id'))
        {
            //Drop 'profile_photo_id' column
            Schema::table('users', function(Blueprint $table) {
                $table->dropColumn('profile_photo_id');
            });
        }
    }

}
