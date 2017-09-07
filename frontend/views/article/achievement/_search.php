<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\AchievementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="achievement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'subject') ?>

    <?= $form->field($model, 'periodical') ?>

    <?= $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'serial_number') ?>

    <?php // echo $form->field($model, 'ei') ?>

    <?php // echo $form->field($model, 'hint') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('common', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('common', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
