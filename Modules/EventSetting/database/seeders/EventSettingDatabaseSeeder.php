<?php

namespace Modules\EventSetting\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\EventSetting;

class EventSettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        /*
         * EventSettings Seed
         * ------------------
         */

        // DB::table('eventsettings')->truncate();
        // echo "Truncate: eventsettings \n";

        EventSetting::factory()->count(20)->create();
        $rows = EventSetting::all();
        echo " Insert: eventsettings \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
