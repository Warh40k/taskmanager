<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $department_id
 * @property string $name
 * @property string $description
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\DepartmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\DepartmentQuery(get_called_class());
    }
}
