<?php

namespace Modules\Template\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\Template;

class TemplateDatabaseSeeder extends Seeder
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
         * Templates Seed
         * ------------------
         */

        // DB::table('templates')->truncate();
        // echo "Truncate: templates \n";

        Template::factory()->count(20)->create();
        $rows = Template::all();
        echo " Insert: templates \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
