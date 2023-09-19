<?php

namespace App\Services\SelectableFull;

use App\Services\SelectableFull\SelectableFullAbstract;
use App\Helpers\CarsFilters;

class RoadsSelectableFullComponent extends SelectableFullAbstract
{       
    public function getInstance(): string {
        return CarsFilters::getRoadsInstance();
    }       

    public function getColumnName(): string {
        return 'f_roads_name';
    }
}
?>