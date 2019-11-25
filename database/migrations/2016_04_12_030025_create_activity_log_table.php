<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action');
            $table->timestamps();
        });
    }

//     `id` int(11) NOT NULL AUTO_INCREMENT,
//   `user_id` int(11) DEFAULT NULL,
//   `action` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
//   `menu_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
//   `ip_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
//   `created_at` timestamp NULL DEFAULT NULL,
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB AUTO_INCREMENT=1251 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activity_log');
    }
}
