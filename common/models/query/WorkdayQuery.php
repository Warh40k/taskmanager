<?php

namespace common\models\query;

use common\models\Workday;

/**
 * This is the ActiveQuery class for [[Workday]].
 *
 * @see Workday
 */
class WorkdayQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Workday[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Workday|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
