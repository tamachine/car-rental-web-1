<?php

namespace App\View\Components;

use App\Models\SeoConfiguration;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SeoTags extends Component
{
    public $seoConfiguration;

    /**
     * Create a new component instance.
     */
    public function __construct(SeoConfiguration $seoConfiguration)
    {
        $this->seoConfiguration = $seoConfiguration;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.seo-tags');
    }
}
