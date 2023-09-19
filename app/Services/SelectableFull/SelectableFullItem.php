<?php

namespace App\Services\SelectableFull;

use JsonSerializable;

class SelectableFullItem implements JsonSerializable
{    
    public $text;
    public $value;    

    public function jsonSerialize () {
        return array(
            'text'  => $this->text,
            'value' => $this->value
        );
    }

    public function toJson() {
        return json_encode($this);
    }
}
?>