<?php

namespace Modules\Subscriber\Console\Commands;

use Illuminate\Console\Command;

class SubscriberCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SubscriberCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscriber Command description';

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
