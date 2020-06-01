<?php

namespace Reached\TextWidget\View\Components;

use Reached\TextWidget\TextWidgetModel;
use Reached\TextWidget\Traits\Widgetable;
use Illuminate\View\Component;
use Illuminate\View\View;

class Editor extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('cms::components.editor');
    }
}
