<?php

namespace Modules\EventSetting\Console\Commands;

use Illuminate\Console\Command;

class EventSettingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:EventSettingCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'EventSetting Command description';

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
