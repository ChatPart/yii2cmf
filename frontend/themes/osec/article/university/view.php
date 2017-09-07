<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model osec\models\University */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '留学项目', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['banner']['pic'] = $model->cover;
$this->params['banner']['subhead'] = $model->data->project;

$frist_cate_id = 0;//$model->categorys[0]->id;
$url = \yii\helpers\Url::to(['/university/document']);

/*******栏目点击事件绑定 ***********/
$js_category = <<<JS
 $('.us-category li a').on('click', function () {
     //alert($(this).attr('data-cate'));
     var cate_id = $(this).attr('data-cate');
     var cthis  = $(this);
     
     //$(".loading").css("display","block");
     $(".loading").show(100);
     
 //if($('.insert-package').attr('class')== 'btn insert-package btn-primary btn-sm' ){
        $.ajax({
            cache: true,
            type: "GET",
            url:'$url',
            data:{'article_id':cate_id },
            //async: false,
            dataType: "json",
            error: function(request) {
                alert("错误");
            },
            success: function(data) {
                $(".loading").hide(100);
                $('.page-content').html(data.content);
                $('.page-title').text(data.title);
                
            //$('.insert-package').text(data.msg);
            //$('.insert-package').attr('class','btn insert-package  btn-sm');
            var a = cthis.parent('li').siblings('.active').removeClass('active');
            //a.css('background:red');
            cthis.parent('li').attr('class','active') ;
           }
        });
    //}

   })
JS;
$js_doc = <<<JS
$.ajax({
            cache: true,
            type: "GET",
            url:'$url',
            data:{'article_id': $frist_cate_id },
            //async: false,
            dataType: "json",
            error: function(request) {
                alert("错误");
            },
            success: function(data) {
                $(".loading").hide(100);
                $('.cate_doc .page-content').html(data.content);
                $('.cate_doc .page-title').text(data.title);
                
            //$('.insert-package').text(data.msg);
            //$('.insert-package').attr('class','btn insert-package  btn-sm');
            //var a = cthis.parent('li').siblings('.active').removeClass('active');
            //a.css('background:red');
            $('.us-category li:first').attr('class','active') ;
             
           }
})
JS;

//$this->registerJs($js_doc, \yii\web\View::POS_LOAD);
$this->registerJs($js_category, \yii\web\View::POS_LOAD);

?>
<section class="main-container">
    <div class="container">
        <div class="row">

            <div class="main col-md-12">
                <a class="loading btn btn-lg moving " style="display: none; position: absolute; right: 49%; top: 9px;"><i class="fa f fa-spinner "></i>loading</a>
                <h3 class="page-title" style="font-weight: 700;">学校简介</h3>
                <div class="separator-2"></div>

                <div class="row">
                    <div class="col-md-8 page-content">
                        <?= $model->data->info ?>
                    </div>
                    <aside class="sidebar col-md-4">
                        <div class="side vertical-divider-left">
                            <div style="position: relative;
    top: -240px;
    z-index: 99;">
                            <div class="block clearfix" >
                                <div class="school_logo overlay-container" style="padding: 0 45px;">
                                    <img class="" src="<?= isset($model->data->school_logo[0]) ? $model->data->school_logo[0] : '' ?>"
                                         alt="">
                                    <a href="<?= isset($model->data->school_logo[0]) ? $model->data->school_logo[0] : '' ?>"
                                       class="overlay popup-img"
                                       title="<?= $model->data->name ?>">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>

                                <ul class="list">
                                    <li><strong class="vertical-divider">英文 </strong> <?= $model->data->en_name ?></li>
                                    <li><strong class="vertical-divider">官网 </strong><a
                                                href="http://<?= $model->data->website ?>"><?= $model->data->website ?></a>
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a class="btn btn-md btn-default" href="page-team.html"><i
                                                class="fa fa-star-o pr-10"></i>报名申请</a>
                                </div>

                            </div>

                                <div class="block clearfix">
                                    <!--<h3 class="title"> 项 目 详 情 </h3>-->
                                    <!--<div class="separator"></div>-->
                                    <nav>
                                        <ul class="nav nav-pills nav-stacked us-category right_sidebar font-15">
                                            <li>
                                                <a data-cate="<?= $model->id ?>">
                                                    学校简介
                                                </a>
                                            </li>
                                            <?php foreach ($model->data->categorys as $cate) { ?>
                                                <li >
                                                    <a data-cate="<?= $cate->id ?>">
                                                        <?= $cate->title ?>
                                                    </a>
                                                </li>
                                            <?php } ?>

                                        </ul>
                                    </nav>
                                </div>

                            <!--<div class="block clearfix">
                                <h5 class="title margin-top-clear">可选专业 </h5>
                                <ul class="list-icons">

                                    <li><i class="fa fa-book pr-5"></i>经济学、金融学与银行学硕士</li>
                                    <li><i class="fa fa-file-text-o pr-5"></i>会计与金融学硕士</li>
                                    <li><i class="fa fa-file-text-o pr-5"></i> 人力资源管理硕士</li>
                                    <li><i class="fa  fa-file-o pr-5"></i> 电子商务营销硕士</li>
                                    <li><i class="fa  fa-file-o pr-5"></i> 市场营销硕士</li>
                                    <li><i class="fa   fa-share pr-5"></i><a href="mailto:johndoe@gmail.com">更多</a></li>
                                </ul>
                            </div>-->
                            <!--<div class="block clearfix">


                                <h3 class="title">Tags</h3>
                                <div class="separator"></div>
                                <div class="tags-cloud">
                                    <div class="tag">
                                        <a href="#">会计与金融学硕士</a>
                                    </div>
                                    <div class="tag">
                                        <a href="#">金融学硕士</a>
                                    </div>
                                    <div class="tag">
                                        <a href="#">culture</a>
                                    </div>
                                    <div class="tag">
                                        <a href="#">health</a>
                                    </div>
                                    <div class="tag">
                                        <a href="#">sports</a>
                                    </div>
                                    <div class="tag">
                                        <a href="#">life style</a>
                                    </div>
                                    <div class="tag">
                                        <a href="#">books</a>
                                    </div>
                                </div>
                            </div>-->
                            </div>
                        </div>
                    </aside>
                    <!-- sidebar end -->
                </div>
                <hr>
            </div>
            <!-- main end -->

        </div>
    </div>
</section>

<div class="section clearfix">

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>学校风采</h2>
                <div class="separator-2"></div>
                <!--<p>Sed ut Perspiciatis Unde Omnis Iste Sed ut sit voluptatem accusan tium </p>-->
                <div class="owl-carousel carousel">
                    <?php
                    $pics = array_slice($model->data->school_logo,1);
                    foreach ($pics as $pic){ ?>
                    <div class="image-box object-non-visible" data-animation-effect="fadeInLeft"
                         data-effect-delay="200">
                        <div class="overlay-container">
                            <img src="<?= $pic ?>" alt="">
                            <a href="<?=$pic ?>" class="popup-img overlay" title="image title">
                                <i class="fa fa-search-plus"></i>
                            </a>
                        </div>
                    </div>
                    <?php } ?>


                </div>

            </div>
        </div>
    </div>

</div>

<div class="university-view">


</div>
