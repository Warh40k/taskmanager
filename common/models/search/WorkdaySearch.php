<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Workday;

/**
 * WorkdaySearch represents the model behind the search form of `common\models\Schedule`.
 */
class WorkdaySearch extends Workday
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['workday_id', 'schedule_id', 'work_length', 'weekend', 'default'], 'integer'],
            [['date'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Workday::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'schedule_id' => $this->schedule_id,
            'workday_id' => $this->workday_id,
            'work_length' => $this->work_length,
            'weekend' => 0,
            'default' => 0,
        ]);

        return $dataProvider;
    }
}
