<?php

namespace Modules\Performance\Console\Commands;

use Illuminate\Console\Command;

class PerformanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:PerformanceCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Performance Command description';

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
