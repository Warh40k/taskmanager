<?php

namespace common\models;

use Yii;


enum ParticipantStatus : int
{
    case Executor = 0;
    case Participant = 1;
    case Creator = 2;
}

/**
 * This is the model class for table "employee_activity".
 *
 * @property int|null $activity_id
 * @property int|null $employee_id
 * @property int|null $status
 */
class Participant extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee_activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['activity_id', 'employee_id', 'status'], 'integer'],
            [['activity_id', 'employee_id', 'status'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'activity_id' => 'Задача',
            'employee_id' => 'Сотрудник',
            'status' => 'Статус участия',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ParticipantQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ParticipantQuery(get_called_class());
    }
}
