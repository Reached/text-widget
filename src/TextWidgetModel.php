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

    public function boot() {
        self::created(function() {
            $this->clearCache();
        });

        self::updated(function() {
            $this->clearCache();
        });

        self::deleted(function() {
            $this->clearCache();
        });
    }
}
