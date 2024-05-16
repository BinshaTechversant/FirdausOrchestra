<?php

namespace Modules\Musician\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\Musician;

class MusicianDatabaseSeeder extends Seeder
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
         * Musicians Seed
         * ------------------
         */

        // DB::table('musicians')->truncate();
        // echo "Truncate: musicians \n";

        Musician::factory()->count(20)->create();
        $rows = Musician::all();
        echo " Insert: musicians \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
