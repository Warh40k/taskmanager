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
 * @property string|null $date_end
 * @property string|null $description
 */
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
            [['name'], 'required'],
            [['expected_length'], 'number'],
            [['date_create', 'date_start', 'date_end'], 'safe'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'activity_id' => 'Activity ID',
            'name' => 'Name',
            'expected_length' => 'Expected Length',
            'date_create' => 'Date Create',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'description' => 'Description',
        ];
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
