<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "schedules".
 *
 * @property int $schedule_id
 * @property string|null $name
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'schedule_id' => 'Ид расписания',
            'name' => 'Название',
        ];
    }


    /**
     * {@inheritdoc}
     * @return \common\models\query\ScheduleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ScheduleQuery(get_called_class());
    }
}
