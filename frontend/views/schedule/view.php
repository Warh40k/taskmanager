<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Schedule $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\frontend\assets\pages\ScheduleAsset::register($this);
?>
<div class="schedule-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'schedule_id' => $model->schedule_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'schedule_id' => $model->schedule_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'schedule_id',
            'name',
        ],
    ]) ?>

    <div id='calendar'></div>


</div>
