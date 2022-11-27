<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "activities".
 *
 * @property int $activity_id
 * @property string $name
 * @property float|null $expected_length
 * @property string $date_create
 * @property string|null $date_start
 * @property int $type
 * @property string|null $date_end
 * @property string|null $description
 */

enum ActivityStatus
{
    case Created;
    case Working;
    case Paused;
    case Closed;

    public function name(): string
    {
        return match($this) {
            self::Created => "Создана",
            self::Working => "В работе",
            self::Paused => "Приостановлена",
            self::Closed => "Закрыта"
        };
    }
}

enum ActivityType: int
{
    case Task = 0;
    case Meeting = 1;
    case Exam = 2;

    public function name(): string
    {
        return match($this) {
            self::Task => "Задача",
            self::Meeting => "Собрание",
            self::Exam => "Экзамен",
        };
    }
}

class Activity extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'expected_length', 'description'], 'required', 'message' => 'Данное поле обязательно к заполнению'],
            [['expected_length'], 'number', 'max' => 100, 'min' => 1,
                'tooBig' => 'Значение должно быть меньше 100', 'tooSmall' => 'Значение должно быть больше 0'],
            [['date_create', 'date_start', 'date_end'], 'safe'],
            [['name', 'description'], 'string', 'max' => 255],
            ['type', 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'activity_id' => 'Ид мероприятия',
            'name' => 'Название',
            'expected_length' => 'Ожидаемая продолжительность (в часах)',
            'date_create' => 'Дата создания',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'description' => 'Описание',
        ];
    }

    public static function instantiate($row)
    {
        $type = ActivityType::cases()[$row['type']]->value;
        switch ($type) {
            case ActivityType::Task->value:
                return new Task();
            case ActivityType::Meeting->value:
                return new Meeting();
            default:
                return new self;
        }
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ActivityQuery(get_called_class());
    }
}
