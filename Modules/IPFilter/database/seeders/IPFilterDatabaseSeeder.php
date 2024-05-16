<?php

namespace Modules\IPFilter\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\IPFilter;

class IPFilterDatabaseSeeder extends Seeder
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
         * IPFilters Seed
         * ------------------
         */

        // DB::table('ipfilters')->truncate();
        // echo "Truncate: ipfilters \n";

        IPFilter::factory()->count(20)->create();
        $rows = IPFilter::all();
        echo " Insert: ipfilters \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
