<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\ueditor\Ueditor;

/* @var $this yii\web\View */
/* @var $model frontend\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_id')->textInput(['maxlength' => true])->label('学号') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'major')->textInput(['maxlength' => true])->label('专业') ?>
    <?= $form->field($model, 'degree')->dropDownList(['博士'=>'博士','硕士'=>'硕士','学士'=>'学士','肄业'=>'肄业']) ?>

    <?= $form->field($model, 'info')->widget(Ueditor::className())  ?>
    <?= $form->field($model, 'icon')->widget('common\widgets\file_upload\FileUpload',[
        'config'=>[]
    ]) ?>
    <?= $form->field($model, 'tagMajor')->widget('common\widgets\tags\Tags')->label('研究方向') ?>

    <?= $form->field($model, 'grade')->textInput(['maxlength' => true,'type'=>'number'])->label('年级 (年份)') ?>
    <?= $form->field($model, 'due')->textInput(['maxlength' => true,'type'=>'number'])->label('毕业时间') ?>

    <?= $form->field($model, 'job')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'achievement')->widget(Ueditor::className())  ?>
    <?= $form->field($model, 'status')->dropDownList([1=>'正常',2=>'隐藏']) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('jiaowu', 'Create') : Yii::t('jiaowu', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
