<?php

namespace Modules\News\Console\Commands;

use Illuminate\Console\Command;

class NewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:NewsCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'News Command description';

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
