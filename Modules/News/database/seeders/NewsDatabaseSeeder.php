<?php

namespace Modules\News\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\News;

class NewsDatabaseSeeder extends Seeder
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
         * News Seed
         * ------------------
         */

        // DB::table('news')->truncate();
        // echo "Truncate: news \n";

        News::factory()->count(20)->create();
        $rows = News::all();
        echo " Insert: news \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
