<?php

namespace Modules\General\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\General;

class GeneralDatabaseSeeder extends Seeder
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
         * Generals Seed
         * ------------------
         */

        // DB::table('generals')->truncate();
        // echo "Truncate: generals \n";

        General::factory()->count(20)->create();
        $rows = General::all();
        echo " Insert: generals \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
