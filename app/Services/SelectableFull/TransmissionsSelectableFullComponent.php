<?php

namespace App\Services\SelectableFull;

use App\Services\SelectableFull\SelectableFullAbstract;
use App\Helpers\CarsFilters;

class TransmissionsSelectableFullComponent extends SelectableFullAbstract
{    
    public function getInstance(): string {     
        return CarsFilters::getTransmissionsInstance();
    }      

    public function getColumnName(): string {
        return 'transmission';
    }
}
?>