<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageHeade extends Component
{
    /**
     * Create a new component instance.
     */
    public $pageTitle;
    public $breadcrumb;
    public function __construct( $pageTitle,$breadcrumb )
    {
        $this->pageTitle = $pageTitle;
        $this->breadcrumb = $breadcrumb;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page-heade');
    }
}
