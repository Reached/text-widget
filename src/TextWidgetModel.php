<?php

namespace Reached\TextWidget;

use Illuminate\Database\Eloquent\Model;

class TextWidgetModel extends Model
{
    protected $fillable = ['block_name', 'text'];

    protected $table = 'text_widgets';
}
