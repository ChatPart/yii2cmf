<?php

use common\modules\city\widgets\CityWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\modules\user\models\Profile */
/* @var $form ActiveForm */
$this->title = Yii::t('common', 'Profile');

$this->params['no_banner'] = true;

$this->params['breadcrumbs'][] = Html::encode($this->title);
?>
<div class="container profile">

    <div class="row">
        <div class="main col-md-12">

            <!-- page-title start -->
            <!-- ================ -->
            <div class="row">
                <div class="col-md-2">
                    <h2 class="page-title" ><?= Yii::$app->user->identity->username?></h2>
                </div>
                <div class="col-md-6">
                    <p style="    margin-top: 30px;">
                        <span>2017级</span>/<span>金融学院</span>/<span>国际关系专业</span><span></span>
                    </p>
                </div>
            </div>
            <div class="separator-2"></div>
            <div class="space"></div>
            <!-- page-title end -->

            <div class="row">
                <aside class="col-md-2 col-sm-4">
                    <div class="sidebar">
                        <div class="block clearfix">
                            <nav>
                                <ul class="nav nav-pills nav-stacked font-15">
                                    <li><a href="<?= Url::toRoute( ['/user/default/index', 'id' => Yii::$app->user->id])?>">项目详情</a></li>
                                    <li><a href="index.html">通知公告</a></li>
                                    <li><a href="<?= Url::toRoute( ['/user/settings/profile', 'id' => Yii::$app->user->id])?>">个人资料</a></li>
                                    <li><a href="portfolio-3col.html">账号设定</a></li>
                                    <li><a href="page-about.html">About</a></li>
                                    <li><a href="page-contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <?= $this->render('../_menu')?>
                </aside>
                <div class="col-lg-9 col-sm-12">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'qq')->textInput() ?>
                    <?= $form->field($model, 'phone')->textInput() ?>
                    <?= $form->field($model, 'gender')->radioList($model->genderList) ?>
                    <?= $form->field($model, 'locale')->dropDownList($model->localeList) ?>

                    <?= $form->field($model, 'signature')->textarea() ?>

                    <?= $form->field($model, 'area')->label('所在地')->widget(CityWidget::className(), [
                        'provinceAttribute' => 'province',
                        'cityAttribute' => 'city',
                        'areaAttribute' => 'area'
                    ]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>

            </div>

        </div>
        <div class="col-md-3">
            <?= $this->render('../_menu')?>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?= Html::encode($this->title) ?>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'qq')->textInput() ?>
                    <?= $form->field($model, 'phone')->textInput() ?>
                    <?= $form->field($model, 'gender')->radioList($model->genderList) ?>
                    <?= $form->field($model, 'locale')->dropDownList($model->localeList) ?>

                    <?= $form->field($model, 'signature')->textarea() ?>

                    <?= $form->field($model, 'area')->label('所在地')->widget(CityWidget::className(), [
                        'provinceAttribute' => 'province',
                        'cityAttribute' => 'city',
                        'areaAttribute' => 'area'
                    ]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('修改', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- profile -->
