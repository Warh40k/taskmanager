<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Position $model */

$this->title = 'Update Position: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'position_id' => $model->position_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
