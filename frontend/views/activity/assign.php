<?php

use common\models\Activity;
use common\models\Employee;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\search\EmployeeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Назначить сотрудника на задачу';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'employee_id',
            'first_name',
            'second_name',
            'third_name',
            'date_attempt',
            'position',
            'department',
            [
                'class' => ActionColumn::className(),
                'template'  => '{submit-employee}',
                'urlCreator' => function ($action, Employee $employee, $key, $index, $column) {
                    $activity_id = Yii::$app->request->get('activity_id');
                    return Url::toRoute([$action, 'activity_id' => $activity_id, 'employee_id' => $employee->employee_id]);
                },
                'buttons' => [
                    'submit-employee' => function($url) {
                        return Html::a('<i class="fa-solid fa-check"></i>', $url, [
                            'title' => 'Подтвердить выбор',
                            'data-confirm' => 'Вы уверены?'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
