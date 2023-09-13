<?php

namespace App\Console\Commands;

use App\Services\NaveCache\NaveCache as NaveCacheService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;

class NaveCache extends Command implements Isolatable
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 
        'nave:cache 
        {--clear :  will delete all the current cache first so all the result endpoints will be first deleted and then loaded}
        ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads all the Nave endpoints to the cache if they are not still loaded';

    /**
     * Execute the console command.
     */
    public function handle(NaveCacheService $naveCache)
    {
        $this->info('Nace cache is being refreshed. This can last more than 10 minutes. You can check the logs in '. config('logging.channels.nave_cache.path'));
        $this->comment('tail -f '. config('logging.channels.nave_cache.path'));

        $this->option('clear') ? $naveCache->clearAndRun() : $naveCache->run();

        $this->info('Nace cache is completly refreshed');
    }
}
