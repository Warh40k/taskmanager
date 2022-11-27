<?php

namespace common\models;

use common\models\query\ActivityQuery;

class Meeting extends Activity
{

    public function init()
    {
        $this->type = ActivityType::Task->value;
        parent::init();
    }

    public static function find()
    {
        return new ActivityQuery(get_called_class(), ['type' => ActivityType::Task->value]);
    }

    public function beforeSave($insert)
    {
        $this->type = ActivityType::Task->value;
        return parent::beforeSave($insert);
    }
}