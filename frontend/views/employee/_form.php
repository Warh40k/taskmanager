<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Employee | frontend\models\SignupForm $model $ */
/** @var yii\widgets\ActiveForm $form */
/** @var int $action */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($action == 'create'): ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

    <?php endif; ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label('Имя') ?>

    <?= $form->field($model, 'second_name')->textInput(['maxlength' => true])->label('Фамилия') ?>

    <?= $form->field($model, 'third_name')->textInput(['maxlength' => true])->label('Отчество') ?>

    <?= $form->field($model, 'date_attempt')->widget(\yii\jui\DatePicker::class, [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd'
    ])->label('Дата приема') ?>

    <?= $form->field($model, 'position')->textInput()->label('Должность') ?>

    <?= $form->field($model, 'department')->textInput()->label('Отдел') ?>

    <?= $form->field($model, 'schedule')->textInput()->label('Расписание') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
