<?php

namespace frontend\assets\pages;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ScheduleAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/calendar.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
        'frontend\assets\libs\CalendarAsset',
    ];
}
