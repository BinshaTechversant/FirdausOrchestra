<?php

namespace Modules\IPFilter\Console\Commands;

use Illuminate\Console\Command;

class IPFilterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:IPFilterCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'IPFilter Command description';

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
