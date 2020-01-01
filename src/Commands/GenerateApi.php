<?php

namespace Bhavingajjar\LaravelApiGenerator\Commands;

use Bhavingajjar\LaravelApiGenerator\LaravelApiGenerator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GenerateApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:generate {--model=}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        if (!file_exists(base_path('app/' . $this->option('model') . '.php'))) {
            $this->info('Model Not Exist');
            return false;
        }

        $api = new LaravelApiGenerator($this->option('model'));
        return true;
    }
}
