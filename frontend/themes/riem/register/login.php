<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View                   $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module           $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss('
.btn-success:hover, .btn-success:active, .btn-success.hover {
    background-color: #008d4c;
}
')
?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>
<div class="row" style="">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
<div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body">

        <?php $form = ActiveForm::begin([


        ]) ?>

        <?= $form->field($model, 'loginStr', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]) ?>

        <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])->passwordInput()->label(Yii::t('user', 'Password') .  ' (' . Html::a(Yii::t('user', 'Forgot password?'), ['/user/recovery/request'], ['tabindex' => '5']) . ')' ) ?>

        <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4']) ?>

        <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'btn btn-primary btn-block btn-flat', 'tabindex' => '3']) ?>

        <?php ActiveForm::end(); ?>


        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <!--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                Google+</a>-->
        </div>
        <!-- /.social-auth-links -->


            <p class="text-center">
                <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
            </p>


            <p class="text-center">
                <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
            </p>

        <?= Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ]) ?>

    </div>
    <!-- /.login-box-body -->

</div>
        </div>
</div>
