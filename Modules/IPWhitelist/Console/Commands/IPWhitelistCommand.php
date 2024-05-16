<?php

namespace Modules\IPWhitelist\Console\Commands;

use Illuminate\Console\Command;

class IPWhitelistCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:IPWhitelistCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'IPWhitelist Command description';

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
