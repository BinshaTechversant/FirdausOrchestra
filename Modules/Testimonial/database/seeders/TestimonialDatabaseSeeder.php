<?php

namespace Modules\Testimonial\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\Testimonial;

class TestimonialDatabaseSeeder extends Seeder
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
         * Testimonials Seed
         * ------------------
         */

        // DB::table('testimonials')->truncate();
        // echo "Truncate: testimonials \n";

        Testimonial::factory()->count(20)->create();
        $rows = Testimonial::all();
        echo " Insert: testimonials \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
