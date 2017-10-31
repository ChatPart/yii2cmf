<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\course\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'college')->textInput() ?>

    <?= $form->field($model, 'teacher')->textInput() ?>

    <?= $form->field($model, 'time')->textarea() ?>
    <?= $form->field($model, 'address')->textarea() ?>

    <?= $form->field($model, 'credit')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([1=>'开放',2=>'隐藏']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
