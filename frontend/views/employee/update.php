<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Employee $model */

$this->title = 'Обновить данные пользователя ' . $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_id, 'url' => ['view', 'employee_id' => $model->employee_id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'action' => 'update'
    ]) ?>

</div>
