<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectBox extends Component
{
    /**
     * Create a new component instance.
     */
    public $options;
    public $label;
    public $required;
    public $value;
    public $name;

    public function __construct($options, $label, $value, $required, $name)
    {
        $this->options = $options;
        $this->label = $label;
        $this->required = $required;
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-box');
    }
}
