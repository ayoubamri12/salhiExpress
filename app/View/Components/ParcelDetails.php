<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ParcelDetails extends Component
{
    /**
     * Create a new component instance.
     */
    public $coli;
    public function __construct(object $coli)
    {
        $this->coli=$coli;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.parcel-details');
    }
}
