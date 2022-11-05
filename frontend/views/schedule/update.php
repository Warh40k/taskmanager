<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Schedule $model */

$this->title = 'Update Schedule: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'schedule_id' => $model->schedule_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
