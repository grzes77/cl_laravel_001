<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Grzesiek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grzesiek:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'testowa komenda';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('jestem haker');
    }
}
