<?php

namespace Modules\Captcha\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\Captcha;

class CaptchaDatabaseSeeder extends Seeder
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
         * Captchas Seed
         * ------------------
         */

        // DB::table('captchas')->truncate();
        // echo "Truncate: captchas \n";

        Captcha::factory()->count(20)->create();
        $rows = Captcha::all();
        echo " Insert: captchas \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
