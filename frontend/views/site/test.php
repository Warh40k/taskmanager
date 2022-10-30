<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="d-flex p-2 flex-column-reverse">
    <?= Html::encode($this->title) ?>
    <p>Another container</p>
</div>