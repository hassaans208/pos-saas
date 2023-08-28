<?php

namespace App\View\Components;

use App\Models\Tenant\City;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CitySelect extends Component
{
    /**
     * Create a new component instance.
     */
    public $options;
    public $required;
    public $value;

    public function __construct($required, $value)
    {
        $this->options = City::select('name', 'id')->paginate(10);
        $this->required = $required;
        $this->value = $value;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.city-select');
    }
}
