<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\team\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_list_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'members') ?>

    <?= $form->field($model, 'begin_at') ?>

    <?= $form->field($model, 'end_at') ?>

    <?= $form->field($model, 'file') ?>

    <?= $form->field($model, 'commit') ?>

    <?= $form->field($model, 'cover') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'created_at') ?>
    <?= $form->field($model, 'created_by') ?>

    <?= $form->field($model, 'detail_list_id') ?>

    <?= $form->field($model, 'sequence') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
