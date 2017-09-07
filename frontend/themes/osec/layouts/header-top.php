<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use backend\widgets\category\CategoryWidget;

/* @var $this \yii\web\View */
/* @var $content string */

?>
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-2 col-sm-6">
                <div class="header-top-first clearfix">
                    <ul class="social-links clearfix hidden-xs">
                        <li class="weibo"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-weibo"></i></a></li>
                        <li class="weixin"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-wechat"></i></a></li>
                    </ul>
                    <div class="social-links hidden-lg hidden-md hidden-sm">
                        <div class="btn-group dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-share-alt"></i></button>
                            <ul class="dropdown-menu dropdown-animation">
                                <li class="facebook"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-facebook"></i></a></li>
                                <li class="pinterest"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-10 col-sm-6">

                <div id="header-top-second"  class="clearfix">

                    <div class="header-top-dropdown">
                        <div class="btn-group dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i> Search</button>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-animation">
                                <li>

                                    <form role="search" class="search-box">
                                        <div class="form-group has-feedback">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <i class="fa fa-search form-control-feedback"></i>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <?php if(Yii::$app->user->isGuest) { ?>
                            <div class="btn-group dropdown ">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i> Login</button>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-animation">
                                    <li>
                                        <?= $this->render(
                                            '_login.php'
                                        ) ?>
                                        <form class="login-form">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Username</label>
                                                <input type="text" class="form-control" placeholder="">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Password</label>
                                                <input type="password" class="form-control" placeholder="">
                                                <i class="fa fa-lock form-control-feedback"></i>
                                            </div>
                                            <button type="submit" class="btn btn-group btn-dark btn-sm">Log In</button>
                                            <span>or</span>
                                            <button type="submit" class="btn btn-group btn-default btn-sm">Sing Up</button>
                                            <ul>
                                                <li><a href="#">Forgot your password?</a></li>
                                            </ul>
                                            <div class="divider"></div>
                                            <span class="text-center">Login with</span>
                                            <ul class="social-links clearfix">
                                                <li class="facebook"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-facebook"></i></a></li>
                                                <li class="twitter"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-twitter"></i></a></li>
                                                <li class="googleplus"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                            <div class="btn-group dropdown">
                                <button type="button" class="btn " >
                                    <a class="" href="<?=Url::toRoute('user/security/login')?>">
                                        <i class="fa fa-search"></i> 登录 </a>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-right dropdown-animation">
                                    <li>
                                        <form class="login-form">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Username</label>
                                                <input type="text" class="form-control" placeholder="">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Password</label>
                                                <input type="password" class="form-control" placeholder="">
                                                <i class="fa fa-lock form-control-feedback"></i>
                                            </div>
                                            <button type="submit" class="btn btn-group btn-dark btn-sm">Log In</button>
                                            <span>or</span>
                                            <button type="submit" class="btn btn-group btn-default btn-sm">Sing Up</button>
                                            <ul>
                                                <li><a href="#">Forgot your password?</a></li>
                                            </ul>
                                            <div class="divider"></div>
                                            <span class="text-center">Login with</span>
                                            <ul class="social-links clearfix">
                                                <li class="facebook"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-facebook"></i></a></li>
                                                <li class="twitter"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-twitter"></i></a></li>
                                                <li class="googleplus"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        <?php }else{ ?>
                            <div class="btn-group dropdown">
                                <img src="<?= Url::to('@web'.Yii::$app->user->identity->getAvatar(32) )?>" class="user-image img-circle" style="display: inline-block"/>

                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                    <?= Yii::$app->user->identity->username ?>

                                </button>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-animation">

                                    <li><a href="<?= Url::toRoute('/dashboard/')?>">控制台 </a></li>
                                    <li><a href="<?= Url::toRoute('/user/default/index',['id'=>2])?>">个人中心</a></li>
                                    <li><a href="">设置 </a></li>
                                    <li><?= Html::a(
                                            '退出',
                                            Url::toRoute('/user/security/logout'),
                                            ['data-method' => 'post', ]
                                        ) ?></li>

                                </ul>
                                <!--<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
                                    <li>
                                        <form class="login-form">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Username</label>
                                                <input type="text" class="form-control" placeholder="">
                                                <i class="fa fa-user form-control-feedback"></i>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label class="control-label">Password</label>
                                                <input type="password" class="form-control" placeholder="">
                                                <i class="fa fa-lock form-control-feedback"></i>
                                            </div>
                                            <button type="submit" class="btn btn-group btn-dark btn-sm">Log In</button>
                                            <span>or</span>
                                            <button type="submit" class="btn btn-group btn-default btn-sm">Sing Up</button>
                                            <ul>
                                                <li><a href="#">Forgot your password?</a></li>
                                            </ul>
                                            <div class="divider"></div>
                                            <span class="text-center">Login with</span>
                                            <ul class="social-links clearfix">
                                                <li class="facebook"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-facebook"></i></a></li>
                                                <li class="twitter"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-twitter"></i></a></li>
                                                <li class="googleplus"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </form>
                                    </li>
                                </ul>-->
                            </div>

                        <?php } ?>
                    </div>

                    <!--  header top dropdowns end -->

                </div>
                <!-- header-top-second end -->

            </div>
        </div>
    </div>
</div>
