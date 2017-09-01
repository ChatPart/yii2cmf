<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Student */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('jiaowu', '在读博士'), 'url' => ['/student/list']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/plugins/student/css/style.css',['depends'=>['yii\bootstrap\BootstrapAsset']]);

?>
<div class="student-view">

<div class="container" style="padding: 2em">
    <div id="home" class="header">
        <div class="" style="width: 80%">
            <div class="top-content">

                <div class="banner-info">
                    <div class="col-md-7 header-right">
                        <h1><?= $model->name?></h1>
                        <h6><?= $model->grade?>级，预计<?= $model->due?>年毕业</h6>
                        <ul class="address">
                            <li>
                                <ul class="address-text">
                                    <li><b>学位</b></li>
                                    <li><?= $model->major?> 博士</li>
                                </ul>
                            </li>
                            <li>
                                <ul class="address-text">
                                    <li><b>Email </b></li>
                                    <li><?= $model->email ?></li>
                                </ul>
                            </li>
                            <li>
                                <ul class="address-text">
                                    <li><b>研究方向 </b></li>
                                    <li><?php foreach ($model->tagMajors as $tag) { ?>
                                            <span class="label  btn-info"><?= $tag->tag ?></span>
                                        <?php } ?></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-5 header-left">
                        <div style="overflow: hidden;max-height: 263px;">
                            <img src="<?= $model->icon?>" alt="">
                        </div>

                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
<div id="about" class="about">
    <div class="row">
    <div class="col-md-5 about-left">
        <div class="box ">
            <div class="box-header">

            </div>
            <div class="box-body " style="padding: 30px">
                <?= $model->info ?>
            </div>
        </div>
    </div>

    <div class="col-md-7 about-right">
        <div class="box ">
            <div class="box-header">
            </div>
            <div class="box-body" style="padding: 30px">
                <?= $model->achievement ?>
            </div>
        </div>

    </div>
    <div class="clearfix"> </div>
    </div>
</div>


</div>
</div>
