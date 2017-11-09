<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/4/7
 * Time: 下午6:13
 */
$this->title = '个人中心';
$this->params['no_banner'] = true;

//$this->params['breadcrumbs'][] = ['label' => '首页', 'url' => ['/']];
$this->params['breadcrumbs'][] = Html::encode($this->title);
//$this->params['no_breadcrumb'] = true;
?>


<!-- main-container start -->
<!-- ================ -->
<section class="main-container">
    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">

                <!-- page-title start -->
                <!-- ================ -->
                <div class="row">
                    <div class="col-md-2">
                        <h2 class="page-title" ><?= $user->username?></h2>
                    </div>
                    <div class="col-md-6">
                        <p style="    margin-top: 30px;">
                            <span>2017级</span>/<span>金融学院</span>/<span>国际关系专业</span><span></span>
                        </p>
                    </div>
                </div>
                <div class="separator-2"></div>
                <div class="space"></div>
                <!-- page-title end -->

                <div class="row">
                    <aside class="col-md-2 col-sm-4">
                        <div class="sidebar">
                            <div class="block clearfix">
                                <nav>
                                    <ul class="nav nav-pills nav-stacked font-15">
                                        <li><a href="<?= Url::toRoute( ['/user/default/index', 'id' => Yii::$app->user->id])?>">项目详情</a></li>
                                        <li><a href="index.html">通知公告</a></li>
                                        <li><a href="<?= Url::toRoute( ['/user/settings/profile', 'id' => Yii::$app->user->id])?>">个人资料</a></li>
                                        <li><a href="portfolio-3col.html">账号设定</a></li>
                                        <li><a href="page-about.html">About</a></li>
                                        <li><a href="page-contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </aside>
                    <div class="col-lg-9 col-sm-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-8 col-sm-offset-4 col-md-offset-0">
                        <div class="vertical-divider-left-lg side">
                            <h2 class="title">Contact Me</h2>
                            <ul class="list-icons">
                                <li><i class="fa fa-phone pr-5"></i>+12 123 123 1234</li>
                                <li><i class="fa fa-mobile pr-5"></i>+12 123 123 1234</li>
                                <li><i class="fa fa-envelope pr-5"></i><a href="mailto:johndoe@gmail.com">johndoe@gmail.com</a></li>
                            </ul>
                            <ul class="social-links colored clearfix">
                                <li class="twitter"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-twitter"></i></a></li>
                                <li class="skype"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-skype"></i></a></li>
                                <li class="facebook"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-facebook"></i></a></li>
                                <li class="googleplus"><a target="_blank" href="http://www.cssmoban.com"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h2>Skills</h2>
                <div class="progress">
                    <div class="progress-bar progress-bar-default" role="progressbar" data-animate-width="80%">
                        <span class="object-non-visible" data-animation-effect="fadeInLeftBig" data-effect-delay="200">HTML5</span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-default" role="progressbar" data-animate-width="90%">
                        <span class="object-non-visible" data-animation-effect="fadeInLeftBig" data-effect-delay="200">CSS3</span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-default" role="progressbar" data-animate-width="75%">
                        <span class="object-non-visible" data-animation-effect="fadeInLeftBig" data-effect-delay="200">JQUERY</span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-default" role="progressbar" data-animate-width="85%">
                        <span class="object-non-visible" data-animation-effect="fadeInLeftBig" data-effect-delay="200">PHP</span>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-default" role="progressbar" data-animate-width="80%">
                        <span class="object-non-visible" data-animation-effect="fadeInLeftBig" data-effect-delay="200">DESIGN</span>
                    </div>
                </div>
                <div class="space"></div>
            </div>
            <!-- main end -->

        </div>
    </div>
</section>
<!-- main-container end -->

<!-- section start -->
<!-- ================ -->
<div class="section gray-bg text-muted footer-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="owl-carousel clients">
                    <div class="client">
                        <a href="#"><img src="images/client-1.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-2.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-3.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-4.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-5.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-6.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-7.png" alt=""></a>
                    </div>
                    <div class="client">
                        <a href="#"><img src="images/client-8.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <blockquote class="inline">
                    <p class="margin-clear">Design is not just what it looks like and feels like. Design is how it works.</p>
                    <footer><cite title="Source Title">Steve Jobs </cite></footer>
                </blockquote>
            </div>
        </div>
    </div>
</div>
<div class="row">

<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-body" style="background: url(http://www.yiichina.com/images/user-bg.jpg); background-size:100% 120px; background-repeat:no-repeat;">
            <div class="profile-user">
                <a href="<?= Url::to(['/user/settings/avatar']) ?>" title="" data-toggle="tooltip" data-original-title="点击修改头像">
                    <?= Html::img($user->getAvatar(96), ['class' => 'avatar']) ?>
                </a>
                <h1><?= $user->username?></h1>
                <span class="label label-primary"><?= $user->getLevel()['nick'] ?></span>
                <p><?= $user->profile->signature?></p>
                <div class="button">
                    <a class="follow btn btn-xs <?php if((new \common\models\Friend())->isFollow($user->id)): ?>btn-danger <?php else: ?>btn-success <?php endif; ?> <?php if ($user->id == Yii::$app->user->id): ?>disabled<?php endif; ?>" href="<?= Url::to(['/friend/follow', 'id' => $user->id]) ?>"><?php if (!(new \common\models\Friend())->isFollow($user->id)): ?><i class="fa fa-plus"></i> 关注Ta <?php else: ?>取消关注 <?php endif; ?></a>
                    <a class="btn btn-xs btn-primary<?php if ($user->id == Yii::$app->user->id):?> disabled<?php endif; ?>" href="<?= Url::to(['/message/default/create', 'id' => $user->id]) ?>"><i class="fa fa-envelope"></i> 发私信</a>
                </div>
                <ul class="stat">
                    <li>金钱<h3><?= $user->profile->money ?></h3></li>
                    <li>关注<h3><?= \common\models\Friend::getFollowNumber($user->id) ?></h3></li>
                    <li>粉丝<h3><?= \common\models\Friend::getFansNumber($user->id) ?></h3></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">个人信息</div>
            <span class="pull-right"><a href="<?= Url::to(['/user/settings/profile']) ?>" title="" data-toggle="tooltip" data-original-title="点击修改个人信息"><i class="fa fa-cog"></i> </a></span>
        </div>
        <div class="panel-body">
            <ul class="user-info">
                <li><i class="fa fa-calendar fa-fw"></i> 注册时间：<?= Yii::$app->formatter->asDatetime($user->created_at) ?></li>
                <li><i class="fa fa-sign-in fa-fw"></i> 最后登录：<?= Yii::$app->formatter->asRelativeTime($user->login_at) ?></li>
                <li><i class="fa fa-map-marker fa-fw"></i> 所在地： <?= $user->profile->fullArea ?></li>
                <li><i class="fa fa-map-signs fa-fw"></i> 个性签名： <?= $user->profile->signature ?></li>
                <li><i class="fa fa-envelope-o fa-fw"></i> 邮箱：<?= $user->email ?></li>
                <li><i class="fa fa-qq fa-fw"></i> QQ：<?= $user->profile->qq ?></li>
                <li><i class="fa fa-phone fa-fw"></i> 手机：<?= $user->profile->phone ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="col-md-9">
    <table class="table table-bordered table-sign">
        <thead>
        <tr><th style="color:red">日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th style="color:red">六</th></tr>
        </thead>
        <tbody>
        <?php foreach ($weeks as $week): ?>
            <tr>
                <?php for ($i=0; $i<7; $i++): ?>
                    <td<?php if(isset($week[$i]) && $week[$i]['sign']): ?> class="success"<?php endif; ?>>
                        <?php if(isset($week[$i])): ?>
                            <?= $week[$i]['day'] ?>
                        <?php endif; ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>