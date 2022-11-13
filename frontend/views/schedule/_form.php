<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Schedule $model */
/** @var yii\widgets\ActiveForm $form */
/** @var string $action */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Наименование расписания') ?>

    <?php if($action == 'create'): ?>
        <div class="form-group">
            <?= Html::label('Количество рабочих часов по умолчанию', 'default_work_length', ['class' => 'control-label' ]) ?>
            <?= Html::textInput('default_work_length', null, ['type' => 'number', 'class' => 'form-control']) ?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
