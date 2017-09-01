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
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View              $this
 * @var dektrium\user\models\User $user
 * @var dektrium\user\Module      $module
 */

$this->title = Yii::t('user', 'Sign up');
$this->params['breadcrumbs'][] = $this->title;
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

        <?= $form->field($model, 'tel') ?>

        <?= $form->field($model, 'username') ?>


            <?= $form->field($model, 'password')->passwordInput() ?>


        <?= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>

        <?php ActiveForm::end(); ?>

        <!--<div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                Google+</a>
        </div>-->


    </div>
    <!-- /.form-box -->
</div>
</div>
    </div>


