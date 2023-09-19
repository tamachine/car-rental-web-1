<?php

namespace App\Services\SelectableFull;

/**
 * Class to return all selectables full components
 */

class AllSelectables
{    
    protected $selectables; //the name used for translations, icons and CarsFilters method
    
    public function __construct(TransmissionsSelectableFullComponent $transmissionsSelectableFull, RoadsSelectableFullComponent $roadsSelectableFull, SeatsSelectableFullComponent $seatsSelectableFull, EnginesSelectableFullComponent $enginesSelectableFull) {           
        $this->selectables[$transmissionsSelectableFull->getInstance()] = $transmissionsSelectableFull;
        $this->selectables[$roadsSelectableFull->getInstance()] = $roadsSelectableFull;
        $this->selectables[$seatsSelectableFull->getInstance()] = $seatsSelectableFull;
        $this->selectables[$enginesSelectableFull->getInstance()] = $enginesSelectableFull;
    }

    public function getInstance($instance) {
        return $this->selectables[$instance];
    }

    public function getAll() {    
        return $this->selectables;
    }
}
?>