<?php

namespace Modules\Musician\Console\Commands;

use Illuminate\Console\Command;

class MusicianCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:MusicianCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Musician Command description';

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
