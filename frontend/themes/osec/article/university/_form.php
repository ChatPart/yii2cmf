<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\file_upload\FileUpload;
use common\widgets\ueditor\Ueditor;

/* @var $this yii\web\View */
/* @var $model osec\models\University */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="university-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'project')->dropDownList([
        '硕士项目'=>'硕士项目',
        '本科2+2项目'=>'本科2+2项目',
        '硕士预科'=>'硕士预科',
        '本科预科'=>'本科预科']) ?>

    <?= $form->field($model, 'school_logo')->widget(FileUpload::className(), []) ?>

    <?= $form->field($model, 'pic')->widget(FileUpload::className(), []) ?>

    <?= $form->field($model, 'en_name')->textInput() ?>

    <?= $form->field($model, 'info')->widget(Ueditor::className(),[]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'location')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('osec', 'Create') : Yii::t('osec', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
