<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TimepickerRange extends Component
{    

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.timepicker-range', ['times' => $this->getTimes()]);
    }

    protected function getTimes() {
        $times = [];

        for($i = 0; $i <= 47; $i++) {            
            
            $hour       = floor($i / 2);
            $minute     = ($i % 2 == 0) ? "00" : "30";
            $meridian   = ($hour >= 12) ? "PM" : "AM";

            if ($hour == 0) {
                $hour  = 12;
            } else if ($hour > 12) {
                $hour -= 12;
            }            

            $time = $hour . ":" . $minute;            

            $times[] = ['hour' => $hour, 'minute' => $minute, 'time' => $time, 'meridian' => $meridian];
        }

        return $times;
    }
}