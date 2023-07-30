<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FromLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public $route;
    public $title;
    public function __construct($route, $title)
    {
        $this->route = $route;
        $this->title = $title;

    }
    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.from-layout');
    }
}
