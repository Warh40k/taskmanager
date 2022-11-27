<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Activity]].
 *
 * @see \common\models\Activity
 */
class ActivityQuery extends \yii\db\ActiveQuery
{
    public $type;
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function prepare($builder)
    {
        if ($this->type !== null) {
            $this->andWhere(['type' => $this->type]);
        }
        return parent::prepare($builder);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Activity[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }



    /**
     * {@inheritdoc}
     * @return \common\models\Activity|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
