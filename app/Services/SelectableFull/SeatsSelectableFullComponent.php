<?php

namespace App\Services\SelectableFull;

use App\Services\SelectableFull\SelectableFullAbstract;
use App\Helpers\CarsFilters;

class SeatsSelectableFullComponent extends SelectableFullAbstract
{    
    public function getInstance(): string {
        return CarsFilters::getSeatsInstance();
    }      

    public function getColumnName(): string {
        return 'adult_passengers';
    }
}
?>