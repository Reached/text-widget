<?php

namespace Reached\TextWidget\View\Components;

use Reached\TextWidget\TextWidgetModel;
use Reached\Widgetable\Widgetable;
use Illuminate\View\Component;
use Illuminate\View\View;

class TextWidget extends Component
{
    use Widgetable;

    public $name;
    public $widgetFound = false;

    /**
     * Create a new component instance.
     *
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->widget = $this->findWidget(TextWidgetModel::class, $this->name);

        if($this->widget) {
            $this->widgetFound = true;
        }
    }

    public function widget()
    {
        if($this->widget) {
            return $this->widget;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('cms::components.text-widget');
    }
}
