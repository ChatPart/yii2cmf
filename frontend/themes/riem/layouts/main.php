<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') {
    /**
     * Do not use this code in your template. Remove it.
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {


frontend\themes\riem\assets\AppAsset::register($this);


    //dmstr\web\AdminLteAsset::register($this);
frontend\themes\riem\assets\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/web/lte/dist');
    ?><!DOCTYPE html>
    <?php $this->beginPage() ?>

    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta name="test">
        <meta name="renderer" content="webkit">
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-pblue-light layout-top-nav">

    <?php $this->beginBody() ?>
    <div class="wrapper">
        <header class="main-header top-header">
            <nav class="navbar navbar-static-top site-index" role="navigation">
                <div class="container-self" style="padding-right: 15px;padding-left: 15px;">


                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse"
                         style="/*margin-left: -17px;*/">
                        <?php
                        /*if(Yii::$app->user->isGuest) {
                            $menuItemsCenter = [
                                ['label' => '登录', 'url' => ['/site/login']],
                                ['label' => '注册', 'url' => ['/site/registe']],

                            ];
                        }else{*/

                        //$menu = new CategoryWidget(['precate_name'=>'document']);
                        //$menuItemsCenter = $menu->getCate();  //获取树状栏目
                        //$menuItemsCenter = \mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id,$menuItemsCenter);
                        //var_dump($menuItemsCenter);die();
                        echo \yii\bootstrap\Nav::widget([
                            'options' => ['class' => 'nav navbar-nav'],
                            'encodeLabels' => false,
                            'items' => [
                                ['label' => 'Home', 'url' => '/site/index'],
                                ['label' => '中国家庭金融调查与研究中心', 'url' => 'http://chfs.swufe.edu.cn/','options'=>[]],
                                ['label' => 'For International Students', 'url' => 'http://riem.swufe.edu.cn/internetional/','options'=>[]],
                                //['label' => '海外学习交流中心', 'url' => '#'],
                            ],
                        ]);

                        ?>
                    </div>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <!--<form class="navbar-form navbar-right" role="search" style="float: right;display: inline-block">
                                <div class="form-group">

                                    <input type="text" class="form-control" id="navbar-search-input" placeholder="搜索">
                                </div>
                            </form>-->
                            <?php if (Yii::$app->user->isGuest) {

                                echo \yii\bootstrap\Nav::widget([
                                    'options' => ['class' => 'nav navbar-nav'],
                                    'encodeLabels' => false,
                                    'items' => [

                                        ['label' => 'login', 'url' => Url::toRoute('user/security/login'), 'linkOptions' => ['target' => "_blank"]],
                                        ['label' => 'old website', 'url' => 'http://riem.swufe.edu.cn/riem/index.html', 'options' => ['target' => "_blank"]],
                                    ],
                                ]);

                                ?>
                            <?php } else {
                                echo \yii\bootstrap\Nav::widget([
                                    'options' => ['class' => 'nav navbar-nav'],
                                    'encodeLabels' => false,
                                    'items' => [
                                        ['label' => '旧版网站', 'url' => 'http://riem.swufe.edu.cn/riem/index.html', 'options' => ['target' => "_blank"]],
                                    ],
                                ]);
                                ?>
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?= Yii::$app->user->identity->profile->gravatar_email ?>"
                                             class="user-image" alt="User Image"/>
                                        <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="box box-widget ">
                                                <div class="box-footer no-padding">
                                                    <ul class="nav nav-stacked">
                                                        <li><a href="/dashboard/">控制台 </a></li>
                                                        <li><a href="#">设置 </a></li>
                                                        <li><?= Html::a(
                                                                '退出',
                                                                ['/site/logout'],
                                                                ['data-method' => 'get',]
                                                            ) ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- Menu Body -->

                                        <!-- Menu Footer-->

                                    </ul>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </nav>

        </header>
        <div class="breadcrumb_banner" style="">
            <div id="">
                <div class="container">
                    <div class="row">
                        <a class="col-sm-7 normal" href="<?= Yii::$app->homeUrl ?>"
                           style=" padding: 25px 0;display: inline-block;">
                            <img class="banner-logo" style="width: 100%;" src="<?= Url::to('@web/images/top.png') ?>" />
                        </a>
                        <div class="col-sm-5  normal">
                            <div class="row" style="margin-top: 1em;">
                                <div class="col-sm-6 pull-right">
                                    <a href="<?= Yii::t('common', '') ?>" class=" index-top-tip">
                                        <i class="fa fa-exchange"></i> 中文</a>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-sm-6 pull-right">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="搜索">

                                        <div class="input-group-btn">
                                            <button type="button" class="btn "><i class="fa fa-search"
                                                                                  style="color: #fff;"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--<div class="row">
                                <div class="col-md-1 pull-right normal" style="padding-left: 0"></div>
                                <div class="col-md-5  pull-right normal" style="padding-right: 0">
                                    <form class="navbar-form navbar-right" role="search" style="float: right;display: inline-block;margin-right: -10px;">
                                        <div class="form-group">

                                            <input type="text" class="form-control" id="navbar-search-input" placeholder="搜索" style="width: auto;    height: 27px;    background-color: rgba(119, 249, 255, 0.33);color:#fff">
                                        </div>
                                    </form>
                                </div>
                            </div>-->
                            <!--<div class="row">
                                <div class="col-md-1 pull-right"></div>
                                <div class="col-md-5 pull-right">
                                <a class="btn btn-block btn-social btn-twitter">
                                     在线申请（Apply Now）
                                </a>
                                </div>
                            </div>-->

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <?= $this->render(
            'header_nav.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>


        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>


    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
