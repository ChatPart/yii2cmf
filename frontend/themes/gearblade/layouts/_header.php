<?php
/**
 * @var \yii\web\View $this
 */
use yii\helpers\Html;
use yii\bootstrap\Nav;
?>
<!-- Header Section -->
<header class="header_s header_s1">
    <!-- Container -->
    <div class="container">
        <div class="bg-block">
            <!-- SidePanel -->
            <div id="slidepanel">
                <!-- Top Header -->
                <div class="container-fluid no-right-padding no-left-padding top-header1">
                    <div class="col-md-offset-3 col-md-9 col-sm-12 col-xs-12 top-block">
                        <div class="col-md-6 col-sm-6 col-xs-12 welcome-line">
                            <h6>技术驱动未来</h6>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <ul class="top-social">
                                <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- Top Header /- -->
            </div><!-- SidePanel /- -->

            <!-- Ownavigation -->
            <nav class="navbar ownavigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="<?= \yii\helpers\Url::to('@web/gearblade/assets/images/logo-word_220.png') ?>" alt="logo"></a>
                </div>
                <div class="analysis-btn">
                    <a href="#" title="Free seo analysis"> <i class="fa fa-phone"></i>  咨 询 客 服 </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse navbar-left">
                    <?php
                    $navItems = \common\models\Nav::getTreeItems('header');
                    //var_dump($navItems);die();
                    /*echo \yii\widgets\Menu::widget([
                        'items' => $navItems,
                        'options' => ['class' => 'nav navbar-nav'],
                        'activeCssClass' => 'crt',
                        //'dropDownCaret' => '',
                    ]);*/
                    echo Nav::widget([
                        'options' => ['class' => 'nav navbar-nav'],
                        'encodeLabels' => false,
                        'items' => $navItems,
                        'dropDownCaret' => '',
                    ]);
                    ?>

                </div>
                <div id="loginpanel" class="desktop-hide">
                    <div class="right" id="toggle">
                        <a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
                        <a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
                    </div>
                </div>
            </nav><!-- Ownavigation /- -->
        </div>
    </div>
    <!-- Container /- -->
</header>
<!-- Header Section /- -->