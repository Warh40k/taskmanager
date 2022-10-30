<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "positions".
 *
 * @property int $position_id
 * @property string|null $name
 * @property float|null $salary
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'positions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['salary'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'position_id' => 'Position ID',
            'name' => 'Name',
            'salary' => 'Salary',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PositionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PositionQuery(get_called_class());
    }
}
