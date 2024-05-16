<?php

namespace Modules\Captcha\Console\Commands;

use Illuminate\Console\Command;

class CaptchaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CaptchaCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Captcha Command description';

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
