<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GtagConsent extends Component
{
    public $trackingId;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->trackingId = config('services.google.gtag.id');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.gtag-consent', [
            'trackingId' => $this->trackingId,
        ]);
    }
}
