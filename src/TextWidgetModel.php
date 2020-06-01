<?php

namespace Reached\TextWidget;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class TextWidgetModel extends Model
{
    protected $fillable = ['block_name', 'text'];

    protected $table = 'text_widgets';

    private static function clearCache() {
        if(app()->environment('production')) {
            Cache::flush();
        }
    }

    protected static function booted() {
        static::created(function() {
            $this->clearCache();
        });

        static::updated(function() {
            $this->clearCache();
        });

        static::deleted(function() {
            $this->clearCache();
        });
    }
}
