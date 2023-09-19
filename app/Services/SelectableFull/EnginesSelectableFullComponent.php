<?php

namespace App\Services\SelectableFull;

use App\Services\SelectableFull\SelectableFullAbstract;
use App\Helpers\CarsFilters;

class EnginesSelectableFullComponent extends SelectableFullAbstract
{    
    public function getInstance(): string {
        return CarsFilters::getEnginesInstance();
    }      

    public function getColumnName(): string {
        return 'engine';
    }
}
?>