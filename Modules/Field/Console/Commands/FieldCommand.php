<?php

namespace Modules\Field\Console\Commands;

use Illuminate\Console\Command;

class FieldCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:FieldCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Field Command description';

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
