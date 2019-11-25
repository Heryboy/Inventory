<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ActivitylogTableSeeder::class);
        // $this->call('ActivitylogTableSeeder');
        // $this->command->info('ActivityLog Seeded!');
    }
}

class ActivitylogTableSeeder extends Seeder {

    public function run()
    {
        DB::table('activity_log')->delete();
        Activitylog::create(array('action' => 'foo@bar.com'));
    }

}
