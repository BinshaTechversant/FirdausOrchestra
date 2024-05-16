<?php

namespace Modules\IPWhitelist\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\IPWhitelist;

class IPWhitelistDatabaseSeeder extends Seeder
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
         * IPWhitelists Seed
         * ------------------
         */

        // DB::table('ipwhitelists')->truncate();
        // echo "Truncate: ipwhitelists \n";

        IPWhitelist::factory()->count(20)->create();
        $rows = IPWhitelist::all();
        echo " Insert: ipwhitelists \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
