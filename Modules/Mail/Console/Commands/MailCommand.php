<?php

namespace Modules\Mail\Console\Commands;

use Illuminate\Console\Command;

class MailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:MailCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mail Command description';

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
