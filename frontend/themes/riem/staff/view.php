<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Staff */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '教学研究人员', 'url' => ['particular/staff?page=1&sort=name']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-view  container">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-body box-profile" style="padding: 29px;">
                    <img class="img-responsive staff-icon" src="<?= $model->icon?:'/images/icon/icon__VIP.png' ?>" alt="Photo">
                    <!--
                    <h3 class="profile-username text-center">陈于民</h3>

                    <p class="text-muted text-center">副教授</p>-->

                    <ul class="list-group list-group-unbordered" >

                        <li class="list-group-item staff-info">
                             <!--<i class="fa fa-envelope"></i>--> <?= $model->public_email ?>
                        </li>
                        <li class="list-group-item staff-info">
                             <i class="fa fa-phone"></i> <?= $model->tel ?>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="box box-solid">
                <!--<div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>-->
                <div class="box-body staff-info" style="padding: 33px;">

                    <p class="text-muted"><strong><i class="fa fa-book margin-r-5"></i>学历</strong></p>
                    <p class="">
                        <?= $model->education ?>
                    </p>

                    <hr>

                    <p class="text-muted"><strong><i class="fa fa-map-marker margin-r-5"></i>办公室</strong></p>

                    <p class="">
                        <?= $model->location ?> </p>

                    <hr>

                    <!--<p class="text-muted"><strong><i class="fa fa-pencil margin-r-5"></i> 研究方向</strong></p>
                    <p>
                        <span class="label label-info">测试</span>
                        <span class="label label-warning">经济管理</span>
                        <span class="label label-primary">经济管理</span>
                    </p>-->
                    <hr>

                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h3 style="    font-size: 2em;
    color: #FFF;
    background: #3b8de6;
    display: inline-block;
    padding: 0.5em 0.5em;
    margin-top: 3px;
    letter-spacing: 3px;
    /* position: relative; */
    box-shadow: 0 1px 4px 0 rgba(0,0,0,0.2), 0 2px 11px 0 rgba(0,0,0,0.19);"><?= $model->name ?></h3>

            <p class="text-muted">
                <?php foreach ($model->tags as $tag) { ?>
                    <span class="tag"><?= $tag->tag ?></span>
                <?php } ?>

            </p>
            <hr>

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">个人信息</a></li>
                    <li><a href="#timeline" data-toggle="tab">科学研究</a></li>
                    <li><a href="#settings" data-toggle="tab">教学</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <?= $model->resume ?>

                    </div>
                    <div class="tab-pane" id="timeline">
                        <?= $model->achievement ?>

                    </div>
                    <div class="active tab-pane" id="settings">
                        <?= $model->project ?>

                    </div>


                </div>

            </div>

        </div>

    </div>



</div>
