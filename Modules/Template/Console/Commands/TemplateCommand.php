<?php

namespace Modules\Template\Console\Commands;

use Illuminate\Console\Command;

class TemplateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:TemplateCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Template Command description';

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
