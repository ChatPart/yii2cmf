<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Achievement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="achievement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'year_id')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'periodical')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cate')->dropDownList([97 => '教师发表',98=>'学生发表'])->label('栏目') ?>

    <?= $form->field($model, 'publish_at' )
        ->widget(kartik\datetime\DateTimePicker::classname(), [
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-d',
            //'startDate' => '01-Mar-2014 12:00 AM',
            'todayHighlight' => true
        ]
    ])
    ?>

    <?= $form->field($model, 'hint')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
