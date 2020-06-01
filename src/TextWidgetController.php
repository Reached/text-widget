<?php

namespace Reached\TextWidget;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TextWidgetController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'text' => 'nullable|string',
            'id' => 'required'
        ]);

        $widget = TextWidgetModel::where('id', (int)$request->get('id'))->first();
        $widget->text = $request->get('text');

        $widget->update();
    }
}
