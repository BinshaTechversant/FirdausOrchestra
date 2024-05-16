<?php

namespace Modules\Performance\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\Performance;

class PerformanceDatabaseSeeder extends Seeder
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
         * Performances Seed
         * ------------------
         */

        // DB::table('performances')->truncate();
        // echo "Truncate: performances \n";

        Performance::factory()->count(20)->create();
        $rows = Performance::all();
        echo " Insert: performances \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
