<?php

namespace App\View\Components;

class SelectableSimple extends SelectableFull
{
    public $mode = 'simple'; 

    protected function getView() {
        return 'components.selectable-simple';
    }
}
