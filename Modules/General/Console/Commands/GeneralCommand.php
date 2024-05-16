<?php

namespace Modules\General\Console\Commands;

use Illuminate\Console\Command;

class GeneralCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:GeneralCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'General Command description';

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
