<?php

namespace Reached\TextWidget\View\Components;

use Reached\TextWidget\TextWidgetModel;
use Illuminate\View\Component;
use Illuminate\View\View;

class TextWidget extends Component
{
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
    
    public function findWidget($model, $name)
    {
        $class = $model;
        $instance = new $class();

        if(app()->environment('local')) {
            return $instance->firstOrCreate(
                ['block_name' => $name],
                ['text' => "Some text for the $name widget"]
            );
        }

        return Cache::remember($model . '-' . $name, now()->addHours(12), function() use($instance, $name) {
            return $instance->where('block_name', $name)->first();
        });
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
