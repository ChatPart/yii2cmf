<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use yii\helpers\Url;
use common\models\Cate;
?>
<div class="content-wrapper ">
    <?php if(!isset($this->params['index'])){ ?>
    <section class="content-header container">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <!--<h1><?= $this->blocks['content-header'] ?></h1>-->
        <?php } else { ?>
            <!--<h1>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
            </h1>-->
        <?php } ?>

        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>
    <?php } ?>

    <section class="content ">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>

</div>
<footer id="footer" >
    <div class="footer top-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4   ">
                    <div class="footer-content">
                        <div class="text-center">
                            <a class="" href="http://www.swufe.edu.cn/">
                                <img src="/images/top.jpg" style="padding-top: 21px;height: 99px;" class="img-responsive bottom-img"
                                     alt="swufe">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5" style="border-right: 1px solid #d7d7d7;padding:0 20px">
                    <div class="footer-content" style="padding:0 20px">
                        <div class="row">
                            <h5>相关链接</h5>
                            <div class="col-sm-6">
                                <ul class="social-links circle">
                                <?php
                                $link_bottom = Cate::findAll(['status'=>Cate::$STATUS_AOLLOW,'pre_cate'=>46]);
                                for($i=0; $i<count($link_bottom); $i+=2){ ?>
                                    <li class="">
                                        <a href="<?= $link_bottom[$i]->uri?>"><?= $link_bottom[$i]->name?></a>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="social-links circle">
                                    <?php
                                    $link_bottom = Cate::findAll(['status'=>Cate::$STATUS_AOLLOW,'pre_cate'=>46]);
                                    for($i=1; $i<count($link_bottom); $i+=2){ ?>
                                        <li class="">
                                            <a href=<?= $link_bottom[$i]->uri?>><?= $link_bottom[$i]->name?> </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2" >
                    <div class="footer-content" style="margin-right: 49px;">
                        <nav>
                            <ul class="nav  nav-stacked">
                                <li class="jiaowu">
                                    <a href=<?= Url::toRoute('/frontend/info?id=675')?>>人员招聘</a>
                                </li>
                                <li class="jiaowu">
                                    <a href=<?= Url::toRoute('/frontend/info?id=675')?>> 联系我们</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="space-bottom hidden-lg hidden-xs"></div>



            </div>
            <div class="space-bottom hidden-lg hidden-xs"></div>
        </div>
    </div>
    <div class="footer sub-footer" style="height: auto;">
        <div class="container">
            <div class="row " style="color:white">
                <div class="col-md-3 normal">
                    <div class="banquan">
                        <p>版权所有：西南财经大学经济与管理研究院</p>
                        <p>技术支持：归锋科技</p>
                       <!-- <p class="">
                            <a class="simplenav" href="<?/*= Url::toRoute('/site/index')*/?>">Home</a> |
                            <a class="simplenav" href="<?/*=Url::toRoute('/frontend/info')*/?>">About</a> |
                            <a class="simplenav" href="<?/*=Url::toRoute('/user/login')*/?>">Login</a> |
                        </p>-->
                    </div>
                </div>

                <div class="col-md-4 normal">
                    <div class="">
                        <address >
                            <ul class="address">
                                <li><?= Yii::t('common','柳林校区')?></li>
                                <li><?= Yii::t('common','地址：成都市温江区柳台大道555号格致楼12楼')?></li>
                                <li><?= Yii::t('common','Tel')?>： 028-87092099  </li>
                                <li><?= Yii::t('common','PC')?>： 611130</li>
                            </ul>
                        </address>
                    </div>
                </div>
                <div class="col-md-4 normal">
                    <div class="">

                        <address >
                            <ul class="address">
                                <li><?= Yii::t('common','光华校区')?></li>
                                <li><?= Yii::t('common','地址：成都市光华村街55号北三门经管楼')?></li>
                                <li><?= Yii::t('common','Tel')?>： 028-87092099  </li>
                                <li><?= Yii::t('common','PC')?>： 610074</li>
                            </ul>
                        </address>

                    </div>
                </div>
                <div class="col-md-1 normal">
                    <div style="padding: 10px">
                        <img src=<?= Url::to('@web/images/qr.jpg') ?>  style="width: 85px">
                    </div>
                </div>
                <!--<div class="col-md-4 normal">

                    <div class="social text-left">

                        <a href="#"><i class="fa fa-weibo"></i></a>

                        <a href="#"><i class="fa fa-github"></i></a>
                    </div>
                    <br>-->
                    <!--<p class="text-left">
                        Copyright 2015 西南交通大学 All rights reserved.
                    </p><p class="text-left">
                      蜀ICP备05026985号 查号台：+86-28-87600114
                    </p>
                    <p class="text-left">

                    </p><p class="text-left">
                        川公网安备 51010602000061号
                    </p>
                </div>-->
            </div>
            <br>
            <!-- /row of panels -->
        </div>
    </div>
</footer>
<!--<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>版本</b> beta 0.8
    </div>
    <strong>Copyright &copy; 2016-2017 <a href="http://.com">归锋工作室</a></strong> 技术支持
</footer>-->

<!-- Control Sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>