<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">G</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo','target'=>'_blank']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <?php //var_dump(Yii::$app->user->isGuest);die(); ?>
        <?php if(!isset(Yii::$app->user->identity->id)) { ?>
            <li class="">
                <a href="/user/login" >
                    登录
                </a>
            </li>
            <li class="dropdown user user-menu">
                <a href="/user/register" >
                    注册
                </a>
            </li>
                <?php }else{
            /*$social = new \vendor\social\chat();
            $social->login();die();*/
            //$this->registerJsFile('/chat/js/domain.js',['depends'=>'backend\assets\AdminLteAsset','position'=>\yii\web\View::POS_END]);
            ?>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= Yii::$app->user->identity->profile->gravatar_email ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                    </a>
                <ul class="dropdown-menu">
                    <li >
                        <div class="box box-widget ">
                            <div class="box-footer no-padding">
                                <ul class="nav nav-stacked">
                                    <li><a href="/dashboard/">控制台 </a></li>
                                    <li><a href="#">设置 </a></li>
                                    <li><?= Html::a(
                                            '退出',
                                            ['/site/logout'],
                                            ['data-method' => 'post', ]
                                        ) ?></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                </li>
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                <?php } ?>

            </ul>
        </div>
    </nav>
</header>
