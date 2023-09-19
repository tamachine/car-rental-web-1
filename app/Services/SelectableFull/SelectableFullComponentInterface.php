<?php

namespace App\Services\SelectableFull;

interface SelectableFullComponentInterface {
    public function getInstance(); //the name used for translations and CarsFilters method in all SelectableFullAbstract extended classes
    public function getColumnName(); //the name of the column in its corresponding table
}

?>