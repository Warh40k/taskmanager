<?php

use common\models\Activity;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\search\ActivitySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить мероприятие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'activity_id',
            'name',
            'expected_length',
            'date_create',
            'date_start',
            'date_end',
            [
                'attribute' => 'type',
                'label' => 'Тип',
                'value' => function(Activity $model) {
                    return array_key_exists($model->type,\common\models\ActivityStatus::cases())
                        ? \common\models\ActivityType::cases()[$model->type]->name()
                        : "";
                }
            ],
//            [
//                'attribute' => 'status',
//                'label' => 'Статус',
//                'value' => function(Activity $model) {
//                    return array_key_exists($model->,\common\models\ActivityStatus::cases())
//                        ? \common\models\ActivityStatus::cases()[$model->type]->name()
//                        : "";
//                }
//            ],
            //'description',
            [
                'class' => ActionColumn::className(),
                'template'  => '{view} {update} {delete} {assign}',
                'urlCreator' => function ($action, Activity $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'activity_id' => $model->activity_id]);
                 },
                 'buttons' => [
                     'assign' => function($url) {
                         return Html::a('<br><i class="fa-sharp fa-solid fa-person-circle-plus"></i>', $url, [
                                 'title' => 'Назначить сотрудника'
                         ]);
                     }
                 ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
