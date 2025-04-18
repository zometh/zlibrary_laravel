<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class book_status extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public int $stock)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.book_status');
    }
}
