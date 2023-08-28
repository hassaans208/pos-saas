<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputBox extends Component
{
    /**
     * Create a new component instance.
     */

     public $name;
     public $value;
     public $required;
     public $label;
     public $pattern;


    public function __construct( $name, ?string $value = null ,  $required, $label, $pattern = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->required = $required;
        $this->label = $label;
        $this->pattern = $pattern;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-box');
    }
}
