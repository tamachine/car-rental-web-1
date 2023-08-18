<?php

namespace App\View\Components;

use App\Models\SeoConfiguration;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SeoSchemas extends Component
{
    public $seoConfiguration;

    public $schemas;

    /**
     * Create a new component instance.
     */
    public function __construct(SeoConfiguration $seoConfiguration)
    {
        $this->seoConfiguration = $seoConfiguration;

        $this->schemas = $this->seoConfiguration->seoSchemas;                
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.seo-schemas');
    }
}
