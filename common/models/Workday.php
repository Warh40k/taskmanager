<?php

namespace common\models;

use common\models\query\WorkdayQuery;
use DateTime;
use Yii;

/**
 * This is the model class for table "workdays".
 *
 * @property int $workday_id
 * @property int $schedule_id
 * @property string $date
 * @property string $time_start
 * @property float $work_length
 * @property float|null $rest_length
 */
class Workday extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workdays';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['schedule_id', 'date', 'time_start', 'work_length'], 'required'],
            [['schedule_id'], 'integer'],
            [['date', 'time_start'], 'string'],
            [['work_length', 'rest_length'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'workday_id' => 'Workday ID',
            'schedule_id' => 'Schedule ID',
            'date' => 'Date',
            'time_start' => 'Time Start',
            'work_length' => 'Work Length',
            'rest_length' => 'Rest Length',
        ];
    }

    /**
     * {@inheritdoc}
     * @return WorkdayQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkdayQuery(get_called_class());
    }
}
