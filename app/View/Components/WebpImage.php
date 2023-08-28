<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\WebPSupportChecker;

class WebpImage extends Component
{  
    public $imagePath;

    public $webpImagePath;

    protected $checker;

    protected $src;

    public function __construct(WebPSupportChecker $checker, $imagePath, $webpImagePath = null) {
        $this->checker       = $checker;
        $this->imagePath     = $imagePath;
        $this->webpImagePath = $webpImagePath;

        $this->setSrc();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.webp-image', ['src' => $this->src]);
    }

    protected function setSrc() {
        $this->src = ($this->checker->supportsWebP() && $this->webpImagePath) ? $this->webpImagePath : $this->imagePath;
    }
}
