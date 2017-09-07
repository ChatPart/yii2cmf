<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\Category;

/* @var $this yii\web\View */

$this->title = '经济与管理研究院';//Yii::t('common', 'School of International Education');
$this->params['index'] = true;//$this->title;
$this->params['no_banner'] = true;
$this->params['no_breadcrumb'] = true;

$this->params['breadcrumbs'] = null;//$this->title;
$this->blocks['content-header'] = '';

$this->registerCssFile('@web/plugins/flexslider/flexslider.css', []);
//$this->registerCssFile('@web/ic/plugins/magnific-popup/magnific-popup.css',[]);
//$this->registerCssFile('@web/ic/plugins/owl-carousel/owl.carousel.css',[]);

$this->registerJsFile('@web/plugins/flexslider/jquery.flexslider-min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$js = <<<JS
$(function(){
      SyntaxHighlighter.all();
    });
    var sliderMain = function() {
		
	  	$('#fh5co-hero .flexslider').flexslider({
			animation: "slide",

			easing: "swing",
			direction: "vertical",

			slideshowSpeed: 5000,
			directionNav: true,
			start: function(){
				setTimeout(function(){
					$('.slider-text').removeClass('animated fadeInUp');
					$('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
				}, 500);
			},
			before: function(){
				setTimeout(function(){
					$('.slider-text').removeClass('animated fadeInUp');
					$('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
				}, 500);
			}

	  	});

	  	// $('#fh5co-hero .flexslider .slides > li').css('height', $(window).height());	
	  	// $(window).resize(function(){
	  	// 	$('#fh5co-hero .flexslider .slides > li').css('height', $(window).height());	
	  	// });

	};
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
      sliderMain();
    });
JS;
$this->registerJs($js);
?>

<div id="container" class="cf">
    <div id="main" role="main">
        <section class="slider">
            <?= \frontend\widgets\slider\CarouselWidget::widget([
                'key' => 'osec',
                'options' => [
                    'class' => 'mb15 home-carousel',
                ],
            ]) ?>
        </section>
        <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">海外学习交流中心</h4>
                    </div>
                    <div class="modal-body">
                        <p>海外学习交流中心（OSEC）
                            依托西南财经大学经济与管理研究院优势教学资源与广泛的国际关系，学院于2007年成立了海外学习交流中心（OSEC），旨在创办高质量海外教学合作项目，促进中外教育合作与学术交流，为学员提供高水平的留学预科教育，构建留学出国直通车。中心自成立之初就制订了为志在出国深造的广大同学服务的目标，定位于培训与高端项目的建设，为参与者搭建完全区别于留学中介的平台。

                        </p>
                        <!--<ul class="list-icons">
                            <li><i class="icon-check"></i> Nisi minima blanditiis voluptate</li>
                            <li><i class="icon-check"></i> Officiis nisi nam doloribus explicabo</li>
                            <li><i class="icon-check"></i> Debitis delectus corporis aspernatur</li>
                            <li><i class="icon-check"></i> Dolore temporibus odio distinctio</li>
                            <li><i class="icon-check"></i> Reprehenderit optio unde accusantium quia</li>
                        </ul>-->
                        <p>  硕士预科项目(Premaster Foundation Program)
                            凭借经济与管理研究院全海归的高水平师资队伍，中心开设全英文金融、经济、数理等方向课程，对学员进行硕士预科培训。同时为学员完成合作作项目申请及奖学金申请，并给予其他留学相关的咨询与帮助。
                            硕士预科培训为全英文授课，由学院海归教授团队任教，并适时邀请海外合作院校教授参与授课，是专门针对中国学员进入海外知名大学学习所设计的一种基础性桥梁课程。学员将在专业知识以及学习技能等方面得以切实提升，在本土教育环境里充分体会英美名校的教育方式和氛围，避免出国后因对西方教学体系和教学方法的不适应带来的不利，帮助学员顺利完成从中式教育到西式教育的过渡。

                        </p>
                        <p>
                            中心以高度负责的态度对待学员以及海外合作学校，赢得了海外合作高校的高度信任，至今本中心推荐的学员全部得到录取，申请成功率100%。

                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i
                                class="icon-check"></i> Ok
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- section start -->
<!-- ================ -->
<div class="section clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--<h1 class="text-center">About Us</h1>
                <div class="separator"></div>
                <p class="lead text-center">Lorem ipsum dolor sit amet laudantium molestias similique.<br> Quisquam incidunt ut laboriosam.</p>
                -->
                <br>
                <div class="row">

                    <div class="col-md-8">
                        <!--<h1 class="title text-center">通知公告</h1>-->
                        <h1 class="page-title">
                            <a href="<?= Url::to('article/index',['cate'=>'macro_news']) ?>">通知公告</a>
                        </h1>
                        <div class="separator-2"></div>
                        <div class="row">
                            <?= common\widgets\box\BoxWidget::widget([
                                'category' => Category::findOne(['slug' => 'macro_news']),
                                'type' => 'blogpost',
                                //'cate' => 14,
                                'sort' => [
                                    'created_at' => SORT_DESC,
                                ],
                                'liNum' => 4,
                                //'pic' => true,
                                //'title' => ,
                                'url' => Url::toRoute(['document/list', 'cate' => 14]),
                                'css' => ['warper' => 'box-widget index-box ', 'header' => 'with-border index-box-header', 'title' => 'index-box-title', 'icon' => 'index-box-icon bicon-news', 'body' => 'box-profile blue-border',],
                            ]) ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <!--<h2 class="title">留学项目</h2>-->
                        <h2 class="page-title text-center">
                            <a href="<?= Url::to('article/index',['cate'=>'school']) ?>">
                            留学项目</a>
                        </h2>
                        <div class="separator"></div>
                        <div class="university-list panel-group panel-dark" id="accordion">
                            <?php $schools = \frontend\models\Article::findAll(['module'=>'university']);
                                foreach ($schools as $school){ ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $school->id ?>" class="collapsed">
                                            <img style="width: 50px;max-height: 50px;display: inline;background: #fff;" src="<?= @$school->data->school_logo[0] ?>" />
                                            <span style="padding-left: 18px"></span><?= $school->title ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse<?= $school->id ?>" class="panel-collapse collapse ">
                                    <div class="panel-body">
                                        <?= $school->description ?><a href="<?= Url::to(['article/view','id'=>$school->id]) ?>" class="btn btn-default btn-sm">详情</a>
                                    </div>
                                </div>
                            </div>
                                <?php }?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                                           class="collapsed">
                                            <i class="fa fa-html5"></i>西澳大利亚大学硕士项目
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<!-- section end -->

<div class="section clearfix">
    <div class="container">
        <h1 class="page-title">
            <a href="<?= Url::to('article/index',['cate'=>'news']) ?>">
                新闻中心</a>
        </h1>
        <div class="separator-2"></div>
        <!-- masonry grid start -->
        <div class="masonry-grid row">
            <?= common\widgets\box\BoxWidget::widget([
                'category' => Category::findOne(['slug' => 'news']),
                //'config' => ['cate'=>14],
                //'where' => ['category_id' => $category2->id],
                'type' => 'masonry-grid-item',
                //'cate' => 14,
                'sort' => [
                    'created_at' => SORT_DESC,
                ],
                'liNum' => 5,
                //'pic' => true,
                'feature' => true,
                'url' => Url::toRoute(['article/index', 'cate' => 'notice']),
                'css' => ['warper' => 'box-widget index-box ', 'header' => 'with-border index-box-header', 'title' => 'index-box-title', 'icon' => 'index-box-icon bicon-news', 'body' => 'box-profile blue-border',],
            ]) ?>


        </div>
        <!-- masonry grid end -->


    </div>
</div>

<div class="section parallax light-translucent-bg parallax-bg-3">
    <div class="container">


        <div class="call-to-action">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="title text-center">海外学习交流中心</h1>
                    <p class="text-center">高成功率 / 学费减免 / 英文授课 / 海归师资 / 个性服务 / 就业前景 / 校友网络 </p>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <a href="#" class="btn btn-default btn-lg">在线留言</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- banner start -->
<!-- ================ -->


<div class="section gray-bg clearfix">
    <div class="container">
        <h2 class="title">海外生活</h2>
        <div class="separator-2"></div>

        <div class="isotope-container row">
            <div class="col-md-3 col-sm-6 isotope-item web-design">
                <div class="image-box">
                    <div class="overlay-container">
                        <img src="/osec/images/portfolio/4.jpg" alt="">
                        <div class="overlay">
                            <div class="overlay-links">
                                <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                                <a href="/osec/images/portfolio/4.jpg" class="popup-img"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>
                            <span>海外学习与生活</span>
                        </div>
                    </div>
                    <a class="btn btn-light-gray btn-block" data-toggle="modal" data-target="#project-2">海外学习与生活</a>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 isotope-item app-development">
                <div class="image-box">
                    <div class="overlay-container">
                        <img src="/osec/images/portfolio/6.jpg" alt="">
                        <div class="overlay">
                            <div class="overlay-links">
                                <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                                <a href="/osec/images/portfolio/6.jpg" class="popup-img"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>

                        </div>
                    </div>
                    <a class="btn btn-light-gray btn-block" data-toggle="modal" data-target="#project-2">项目优势</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 isotope-item web-design">
                <div class="image-box">
                    <div class="overlay-container">
                        <img src="/osec/images/portfolio/blog1.jpg" alt="">
                        <div class="overlay">

                            <div class="overlay-links">

                                <a href="portfolio-item.html"><i class="fa fa-link"></i>预科课程</a>
                                <a href="/osec/images/portfolio/blog1.jpg" class="popup-img"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="image-box-body">
                        <h3 class="title"><a href="portfolio-item.html">招生对象</a></h3>
                        <ul class="list-icons">
                            <li><i class="fa fa-map-marker pr-10"></i> 准备材料</li>
                            <li><i class="fa fa-phone pr-10"></i> 录取程序</li>
                            <li><i class="fa fa-envelope-o pr-10"></i> 报名方式</li>
                        </ul>


                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 isotope-item web-design">
                <div class="image-box">
                    <div class="overlay-container">
                        <img src="/osec/images/portfolio/g5.jpg" alt="">
                        <div class="overlay">
                            <div class="overlay-links">
                                <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                                <a href="/osec/images/portfolio/g5.jpg" class="popup-img"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>
                            <span>校友信息</span>
                        </div>
                    </div>
                    <a class="btn btn-light-gray btn-block" data-toggle="modal" data-target="#project-2">校友信息</a>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 isotope-item web-design">
                <div class="image-box">
                    <div class="overlay-container">
                        <img src="/osec/images/portfolio/g4.jpg" alt="">
                        <div class="overlay">
                            <div class="overlay-links">
                                <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                                <a href="/osec/images/portfolio/g4.jpg" class="popup-img"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>
                            <span>校友感言</span>
                        </div>
                    </div>
                    <a class="btn btn-light-gray btn-block" data-toggle="modal" data-target="#project-2">校友感言</a>


                </div>
            </div>
            <div class="col-md-3 col-sm-6 isotope-item web-design">
                <div class="image-box">
                    <div class="overlay-container">
                        <img src="/osec/images/portfolio/news1.jpg" alt="">
                        <div class="overlay">
                            <div class="overlay-links">
                                <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                                <a href="/osec/images/portfolio/news1.jpg" class="popup-img"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>
                            <!--<span>学校与签证常见问题</span>-->
                        </div>
                    </div>
                    <a class="btn btn-light-gray btn-block" data-toggle="modal" data-target="#project-2">学校与签证常见问题</a>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 isotope-item web-design">
                <div class="image-box">
                    <div class="overlay-container">
                        <img src="/osec/images/portfolio/news2.jpg" alt="">
                        <div class="overlay">
                            <div class="overlay-links">
                                <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                                <a href="/osec/images/portfolio/news2.jpg" class="popup-img"><i
                                        class="fa fa-search-plus"></i></a>
                            </div>

                        </div>
                    </div>
                    <a class="btn btn-light-gray btn-block" data-toggle="modal" data-target="#project-2">客座教授</a>

                </div>
            </div>
        </div>

    </div>
</div>