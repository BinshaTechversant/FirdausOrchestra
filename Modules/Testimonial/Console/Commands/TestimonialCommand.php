<?php

namespace Modules\Testimonial\Console\Commands;

use Illuminate\Console\Command;

class TestimonialCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:TestimonialCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testimonial Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
