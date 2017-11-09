<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\Category;

/* @var $this yii\web\View */

$this->title = '经济与管理研究院';//Yii::t('common', 'School of International Education');
$this->params['index'] = true;//$this->title;
$this->params['breadcrumbs'] = null;//$this->title;
$this->blocks['content-header'] = '';
//$this->registerCssFile('@web/css/pluging.css',['depends'=>['backend\assets\KodeAsset']]);

//$this->registerJsFile('@web/js/jquery.cslider.js',['depends'=>['backend\assets\KodeAsset']]);
/*$this->registerCss('.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12  .wbox{
    position: relative;
    min-height: 1px;
    padding-right: 8px;
    padding-left: 8px;

}
.normal{
position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
');*/

?>


<div class="container" style="padding-left: 0px;padding-right: 0px">
    <?= \frontend\widgets\slider\CarouselWidget::widget([
        'key' => 'riem',
        'options' => [
            'class' => 'mb15 home-carousel',
        ],
    ]) ?>

    <hr style="    border-top:1px solid #D9E0E6;margin-top: 20px;margin-bottom: 20px;">
    <div class="row" style="    margin-bottom: 7px;">
        <div class="col-md-8" style="">
            <?= common\widgets\box\BoxWidget::widget([
                'category' => Category::findOne(['slug' => 'news']),
                'type' => 'listPic_m',
                //'cate' => 14,
                'sort' => [
                    'created_at' => SORT_DESC,
                ],
                'liNum' => 4,
                //'pic' => true,
                //'title' => ,
                'url' => Url::toRoute(['article/index', 'cate' => 'news']),
                'css' => ['warper' => 'box-widget index-box ', 'header' => 'with-border index-box-header', 'title' => 'index-box-title', 'icon' => 'index-box-icon bicon-news', 'body' => 'box-profile blue-border',],
            ]) ?>


        </div>
        <div class="col-md-4 wbox" style="height: 446px;">
            <?= common\widgets\box\BoxWidget::widget([
                'category' => Category::findOne(['slug' => 'macro_news']),
                'type' => 'index-frame',
                //'cate' => 14,
                'sort' => [
                    'created_at' => SORT_DESC,
                ],
                'liNum' => 6,
                //'pic' => true,
                //'title' => ,
                'url' => Url::toRoute(['article/index', 'cate' => 'macro_news']),
                'css' => ['warper' => 'box-widget index-box ', 'header' => 'with-border index-box-header', 'title' => 'index-box-title', 'icon' => 'index-box-icon bicon-news', 'body' => 'box-profile blue-border',],
            ]) ?>
            <?php /*= common\widgets\box\BoxWidget::widget([
                'type' => 'index-frame', 'cate' => 32, 'title' =>  'Notices', 'liNum' => 6,
                //'type' => 'index-frame', 'cate' => 32, 'title' => Yii::t('common', 'Notices'), 'liNum' => 6,
                'url' => Url::toRoute(['document/list', 'cate' => 32]),
                'css' => ['warper' => 'box-widget index-box blue-border', 'title' => 'index-box-title', 'header' => 'with-border index-box-header', 'icon' => 'index-box-icon bicon-laba', 'body' => 'box-profile',]])
            */ ?>
        </div>
    </div>
    <div class="row" style="margin-bottom: 23px">
        <div class="col-md-6">
            <a href="http://chfs.swufe.edu.cn/" target="_blank">
                <img style="width: 100%" src="<?= Url::to('@web/images/portfolio/广告a(1).jpg') ?>">
            </a>
        </div>
        <div class="col-md-6"><img style="width: 100%" src="<?= Url::to('@web/images/portfolio/广告b(1).jpg') ?>"></div>
    </div>
    <div class="row" style="margin-bottom: 25px;">
        <div class="col-md-8" style="    height: 506px;">

            <?php

            $data = \common\modules\paper\models\Achievement::find()
                ->where([])->asArray()
                ->orderBy(['id' => SORT_DESC])->limit(6)
                ->all();
            ?>
            <div class="box box-widget index-box blue-border">
                <a href="/?r=paper/default/list&sort=-id&AchievementSearch%5Bcate%5D=97" class="uppercase">
                <a href="<?=Url::to(['paper/default/list','sort'=>'-id','AchievementSearch'=>['cate'=>97]]) ?>" class="uppercase">
                    <div class="box-header with-border index-box-header">
                        <i class="index-box-icon bicon-bookmark"></i>

                        <h3 class="box-title index-box-title text-blue">科研成果 </h3>
                        <div class="list-white-bg"></div>
                        <div class="box-tools pull-right"></div>
                    </div>
                </a>
                <div class="box-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover table-tab">
                                    <tbody><tr>
                                        <th class="tab-th"> </th>
                                        <th class="tab-th">题目</th>
                                        <th class="tab-th">作者</th>
                                        <th class="tab-th">期刊</th>
                                    </tr>
                                    <?php foreach ($data as $v) { ?>
                                        <tr>
                                            <td width=70><?= $v['year_id'] ?></td>
                                            <td><?= $v['title'] ?></td>
                                            <td><?= $v['author'] ?></td>
                                            <td><?= @$v['periodical'] ?>
                                                <br><?= @$v['serial_number'] ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="box-footer clearfix">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4 wbox" style="height: 506px;">
            <?= common\widgets\box\BoxWidget::widget([
                'category' => Category::findOne(['slug' => '系列讲座']),
                'type' => 'listPic_m',
                //'cate' => 14,
                'sort' => [
                    'created_at' => SORT_DESC,
                ],
                'liNum' => 4,
                //'pic' => true,
                //'title' => ,
                'url' => Url::toRoute(['article/index', 'cate' => 'news']),
                'css' => ['warper' => 'box-widget index-box ', 'header' => 'with-border index-box-header', 'title' => 'index-box-title', 'icon' => 'index-box-icon bicon-news', 'body' => 'box-profile blue-border',],
            ]) ?>


        </div>
    </div>


</div>
<!-- End Presentation -->

<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTAINER -->

<!-- END CONTAINER -->