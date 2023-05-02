<?php

namespace frontend\assets\libs;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class CalendarAsset extends AssetBundle
{
    public $sourcePath = '@npm/fullcalendar';
    public $css = [
    ];
    public $js = [
        'index.global.min.js'
    ];

}
