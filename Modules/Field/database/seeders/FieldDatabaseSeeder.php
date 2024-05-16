<?php

namespace Modules\Field\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\Field;

class FieldDatabaseSeeder extends Seeder
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
         * Fields Seed
         * ------------------
         */

        // DB::table('fields')->truncate();
        // echo "Truncate: fields \n";

        Field::factory()->count(20)->create();
        $rows = Field::all();
        echo " Insert: fields \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
