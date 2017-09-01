<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View              $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\Module      $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('/lte/plugins/msg/verify.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


?>
<div class="row" style="">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
<div class="register-box">
    <div class="register-box-body">

        <?php $form = ActiveForm::begin([
            'id'                     => 'registration-form',
            //'enableAjaxValidation'   => true,
            //'enableClientValidation' => false,
        ]); ?>



        <?= $form->field($model, 'username') ?>


            <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'tel') ?>
        <?= $form->field($model, 'msg',[
            'template'=>'{label} <div class="input-group ">{input} <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" id="btn-virefy">获取验证短信</button>
                    </span> </div>
                    <p id="virefy-hint"></p>{error}{hint}'
        ]) ?>


        <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

        <?php ActiveForm::end(); ?>

        <!--<div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                Google+</a>
        </div>-->
        <p>- OR -</p>
        <?= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>

    </div>
    <!-- /.form-box -->
</div>
</div>
    </div>


