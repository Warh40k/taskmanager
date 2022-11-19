<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;

/** @var yii\web\View $this */
/** @var frontend\models\CreateScheduleForm $model */
/** @var yii\widgets\ActiveForm $form */
/** @var string $action */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Наименование расписания') ?>

    <?php if($action == 'create'): ?>
        <div class="form-group">
            <?= $form->field($model, 'default_time_start')->widget(TimePicker::classname(),[
                'options' => ['readonly' => 'true'],
                'pluginOptions' => [
                    'template' => 'dropdown',
                    'showMeridian' => false]])->label("Время начала работы") ?>
        </div>
        <div class="form-group">
            <?= $form->field($model, 'default_work_length')->textInput([
                'maxlength' => true])->label("Количество рабочих часов") ?>
        </div>
        <?= $form->field($model, 'calendar_path')->fileInput(['class' => 'form-control']) ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
