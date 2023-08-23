<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\ReadingTime;

class ReadingTimeIcon extends Component
{
    /**
     * The text to calculate the time reading
     *
     * @var string
     */
    public $text = null;

    /**
     * The time string to show
     *
     * @var string
     */
    protected $time;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        $this->text = $text;     
        
        $this->setTime();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.reading-time-icon', ['timeString' => trans_choice('general.minutes', $this->time, ['time' => $this->time])]);
    }

    protected function setTime() {
        $readingTime = new ReadingTime($this->text);
        $timeInMinutes = $readingTime->getTimeInMinutes();

        $this->time = $timeInMinutes == 0 ? 1 : $timeInMinutes;        
    }
}

