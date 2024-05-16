<?php

namespace Modules\Subscriber\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\Subscriber;

class SubscriberDatabaseSeeder extends Seeder
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
         * Subscribers Seed
         * ------------------
         */

        // DB::table('subscribers')->truncate();
        // echo "Truncate: subscribers \n";

        Subscriber::factory()->count(20)->create();
        $rows = Subscriber::all();
        echo " Insert: subscribers \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
