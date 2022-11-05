<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var common\models\Employee | frontend\models\SignupForm $model $ */
/** @var yii\widgets\ActiveForm $form */
/** @var int $action */

    $departments = ArrayHelper::map(\common\models\Department::find()->asArray()->all(), 'department_id', 'name');
    $positions = ArrayHelper::map(\common\models\Position::find()->asArray()->all(), 'position_id', 'name');
    $schedules = ArrayHelper::map(\common\models\Schedule::find()->asArray()->all(), 'schedule_id', 'name')
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

    <?= $form->field($model, 'position')->label('Должность')->widget(Select2::className(), [
            'data' => $positions,
            'options' => ['placeholder' => 'Выберите должность']
    ]) ?>

    <?= $form->field($model, 'department')->label('Отдел')->widget(Select2::className(), [
            'data' => $departments,
            'options' => ['placeholder' => 'Выберите отдел']
    ]) ?>

    <?= $form->field($model, 'schedule')->label('Расписание')->widget(Select2::className(), [
            'data' => $schedules,
            'options' => ['placeholder' => 'Выберите отдел']
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
