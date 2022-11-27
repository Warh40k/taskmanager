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

    public function getResponsible()
    {
        $employee_id = $this->getParticipants()
            ->where(['status' => ParticipantStatus::Creator->value])->one();

        return $employee_id ? Employee::find()
            ->where(['employee_id' => $employee_id->employee_id])->one() : false;
    }

    public function getAttendees()
    {
        $this->getParticipants()->where(['status' => ParticipantStatus::Attendee->value])->all();
    }
}