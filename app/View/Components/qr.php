<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class qr extends Component
{
    /**
     * Create a new component instance.
     */
    public $qr_code ;
    public $code ;
    public function __construct(string $qr_code,string $code)
    {
        $this->qr_code = $qr_code;
        $this->code = $code;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.qr');
    }
}
