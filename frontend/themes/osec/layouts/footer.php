<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use backend\widgets\category\CategoryWidget;

/* @var $this \yii\web\View */
/* @var $content string */

?>
<!-- section start -->
<!-- ================ -->
<div class="section gray-bg text-muted footer-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="owl-carousel clients">
                    <div class="client">
                        <a href="#"><img src="/osec/images/icon/xiaohui/1.gif" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="/osec/images/icon/xiaohui/2.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="/osec/images/icon/xiaohui/4.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="/osec/images/icon/xiaohui/5.jpg" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="/osec/images/icon/xiaohui/6.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="/osec/images/icon/xiaohui/7.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="/osec/images/icon/xiaohui/8.png" alt=""></a>
                    </div><div class="client">
                        <a href="#"><img src="/osec/images/icon/xiaohui/9.png" alt=""></a>
                    </div>
                </div>
            </div>
            <!--<div class="col-md-6">
                <blockquote class="inline">
                    <p class="margin-clear">Design is not just what it looks like and feels like. Design is how it works.</p>
                    <footer><cite title="Source Title">Steve Jobs </cite></footer>
                </blockquote>
            </div>-->
        </div>
    </div>
</div>
<!-- section end -->

<!-- footer start (Add "light" class to #footer in order to enable light footer) -->
<!-- ================ -->

<footer id="footer">

    <!-- .footer start -->
    <!-- ================ -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="footer-content">
                        <div class="" style="float: left;width: 130px;padding: 25px"><img id="logo-footer" src="<?= Url::to('@web/images/logo.png')?>" alt=""></div>
                        <div class="row" style="    float: left;">
                            <div class="col-sm-12">
                                <h4 style=" margin-top: 2px;">西南财经大学经济与管理研究院海外学习交流中心</h4>
                                <ul class="list-icons">
                                    <li><i class="fa fa-map-marker pr-10"></i> 中国四川成都温江区柳台大道555号 西南财经大学柳林校区格致楼1224室</li>
                                    <li><i class="fa fa-phone pr-10"></i> +86 (0)28 8709 2471</li>
                                    <li><i class="fa fa-fax pr-10"></i> 611130</li>
                                    <li><i class="fa fa-envelope-o pr-10"></i> osec@swufe.edu.cn  </li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="space-bottom hidden-lg hidden-xs"></div>
                <div class="col-sm-6 col-md-2">
                    <div class="footer-content">

                        <nav>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="index.html">西南财经大学</a></li>
                                <li class="active"><a href="blog-right-sidebar.html">经济与管理研究院</a></li>
                                <li><a href="portfolio-3col.html">美国德州A&M大学</a>
                                <li><a href="page-about.html">英国埃塞克斯大学</a></li>
                                <li><a href="page-contact.html">英国伯明翰大学</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <div class="footer-content">

                        <nav>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="index.html">新加坡管理大学</a></li>
                                <li class="active"><a href="blog-right-sidebar.html">西澳大利亚大学</a></li>
                                <li><a href="portfolio-3col.html">美国迈阿密大学</a>
                                <li><a href="page-about.html">加拿大圭尔夫大学</a></li>
                                <li><a href="page-contact.html">英国朴茨茅斯大学</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
            <div class="space-bottom hidden-lg hidden-xs"></div>
        </div>
    </div>
    <!-- .footer end -->

    <!-- .subfooter start -->
    <!-- ================ -->
    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>版权©2017 西南财经大学经济与管理研究院海外学习交流中心
                    </p>
                </div>
                <div class="col-md-6">
                    <nav class="navbar navbar-default" role="navigation">
                        <!-- Toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#navbar-collapse-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-collapse-2">
                            <ul class="nav navbar-nav">
                                <li><a href="index.html">首页</a></li>
                                <li><a href="page-about.html">技术支持</a></li>

                                <li><a href="portfolio-3col.html">数据统计</a></li>
                                <li><a href="page-contact.html">联系我们</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- .subfooter end -->

</footer>
<!-- footer end -->