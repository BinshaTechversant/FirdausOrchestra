<?php

namespace Modules\Mail\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\Mail;

class MailDatabaseSeeder extends Seeder
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
         * Mails Seed
         * ------------------
         */

        // DB::table('mails')->truncate();
        // echo "Truncate: mails \n";

        Mail::factory()->count(20)->create();
        $rows = Mail::all();
        echo " Insert: mails \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
