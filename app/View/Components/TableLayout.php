<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public $collection;
    public $title;
    public $head;
    public $delete;
    public $edit;
    public $editRoute;
    public $deleteRoute;
    public $createRoute;
    public $create;
    public $row;
    public $print;
    public $excel;
    public $pdf;
    public $docx;
    public $reload;
    public $action;
    public $options;

    public function __construct($collection, $title, $head, $delete, $edit, $row, $createRoute, $deleteRoute, $editRoute, $create,$print, $excel, $pdf,$docx, $reload, $action, $options)
    {
        $this->collection = $collection; 
        $this->title = $title; 
        $this->head = $head; 
        $this->row = $row; 
        $this->delete = $delete; 
        $this->edit = $edit; 
        $this->create = $create; 
        $this->editRoute = $editRoute; 
        $this->deleteRoute = $deleteRoute; 
        $this->createRoute = $createRoute; 
        $this->print = $print; 
        $this->excel = $excel; 
        $this->pdf = $pdf; 
        $this->docx = $docx; 
        $this->reload = $reload; 
        $this->action = $action; 
        // Search Options
        $this->options = $options;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-layout');
    }
}
