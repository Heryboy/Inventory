<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrewLicense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('crew_license', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('crew_id');
            $table->integer('license_id');
            $table->datetime('issued_time');
            $table->datetime('expired_data');
            $table->string('passport');
            $table->string('airport_pass');
            $table->string('work_permit');
            $table->string('proficiency');
            $table->string('visa');
            $table->rememberToken();
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
        Schema::drop('crew_license');
    }
}
