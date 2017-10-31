<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use common\modules\attachment\widgets\SingleWidget;

/* @var $this yii\web\View */
/* @var $model common\models\NavItem */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="Nav-item-form">

    <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'title') ?>

            <?= $form->field($model, 'url')->textarea(['maxlength' => 1024]) ?>
    <?php echo $form->field($model, 'pid')->Input(['type'=>'number']) ?>

            <?= $form->field($model, 'target')->checkbox() ?>

            <?= $form->field($model, 'status')->checkbox() ?>
    <?= $form->field($model, 'cover')->widget(SingleWidget::className()) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
