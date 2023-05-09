<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $employee_id
 * @property string $first_name
 * @property string $second_name
 * @property string $third_name
 * @property string|null $date_attempt
 * @property int|null $position
 * @property int|null $department
 * @property int|null $schedule
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'second_name', 'third_name'], 'required'],
            [['date_attempt'], 'safe'],
            [['position', 'department', 'schedule'], 'integer'],
            [['first_name', 'second_name', 'third_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Ид сотрудника',
            'first_name' => 'Имя',
            'second_name' => 'Фамилия',
            'third_name' => 'Отчество',
            'date_attempt' => 'Дата приема',
            'position' => 'Должность',
            'department' => 'Отдел',
            'schedule' => 'Расписание',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmployeeQuery(get_called_class());
    }

    public static function deleteScheduleId($schedule_id)
    {
        return self::updateAll(['schedule' => 0], ['schedule' => $schedule_id]);
    }
}
