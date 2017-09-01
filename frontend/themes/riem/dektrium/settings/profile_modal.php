<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var dektrium\user\models\Profile $profile
 */

$this->title = Yii::t('user', '修改地址');
//$this->params['breadcrumbs'][] = $this->title;
$requestUrl = Url::to('/user/settings/profile-modal');
$js = <<<JS


    $('#profile-update').on('click', function () {
    // 有效避免multiply modal select2的问题
    // 移除异步加载过来的form表单
    //alert('ccc');
    $('.document-nav-form').remove();
    $.post('{$requestUrl}', $('#profile-form').serialize(),
        function (data) {
            $('#update-modal').find('.modal-body').html(data);
        }
    );
});
JS;
//$this->registerJs($js,['position'=>\yii\web\View::POS_READY]);
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>


                    <?php $form = \yii\widgets\ActiveForm::begin([
                        'id' => 'profile-form',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                            'labelOptions' => ['class' => 'col-lg-2 control-label'],
                        ],
                        'enableAjaxValidation'   => true,
                        'enableClientValidation' => false,
                        'validateOnBlur'         => false,
                        'enableAjaxValidation' => true,
                        'validationUrl' => Url::toRoute(['validate-form']),
                    ]); ?>

                    <?= $form->field($model, 'school_part')->dropDownList(['西南交大_犀浦'=>'西南交大_犀浦','西南交大_九里'=>'西南交大_九里']) ?>

                    <?= $form->field($model, 'house') ?>
                    <?= $form->field($model, 'room') ?>
                    <?= $form->field($model, 'location') ?>
<?= $form->field($model, 'name') ?>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-5">
                            <?= \yii\helpers\Html::Button(Yii::t('user', 'Save'), ['class' => 'btn btn-block btn-success','id'=>'profile-update']) ?><br>
                        </div>
                    </div>

                    <?php \yii\widgets\ActiveForm::end(); ?>

