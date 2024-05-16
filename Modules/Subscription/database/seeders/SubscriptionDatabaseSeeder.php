<?php

namespace Modules\Subscription\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\Subscription;

class SubscriptionDatabaseSeeder extends Seeder
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
         * Subscriptions Seed
         * ------------------
         */

        // DB::table('subscriptions')->truncate();
        // echo "Truncate: subscriptions \n";

        Subscription::factory()->count(20)->create();
        $rows = Subscription::all();
        echo " Insert: subscriptions \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
