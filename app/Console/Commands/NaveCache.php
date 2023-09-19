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
        {--class=* : pass the NaveCache class that must be re-cached}
        {--show-classes :  will show the available classes and the script will not run}
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
        $this->info('Nave cache is being refreshed. This can last more than 10 minutes');        
        $this->comment('Check logs: tail -f '. config('logging.channels.nave_cache.path'));
        
        if($this->option('show-classes')) {
            dd($naveCache->getClasses());
        } else {
            if (count($this->option('class')) > 0 ) $naveCache->filterClasses($this->option('class'));
            $this->option('clear') ? $naveCache->clearAndRun() : $naveCache->run();
        }        

        $this->info('Nave cache is completly refreshed');
    }
}
