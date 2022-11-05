<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\SignupForm $model */

$this->title = 'Создать аккаунт сотрудника';
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'action' => 'create'
    ]) ?>

</div>
