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
                'url' => Url::toRoute(['document/list', 'cate' => 14]),
                'css' => ['warper' => 'box-widget index-box ', 'header' => 'with-border index-box-header', 'title' => 'index-box-title', 'icon' => 'index-box-icon bicon-news', 'body' => 'box-profile blue-border',],
            ]) ?>

            <?/*= common\widgets\box\BoxWidget::widget([
                'model'=>\common\models\Document::className(),
                //'config' => ['cate'=>14],
                'where' => ['or','cate=96','cate=14'],
                'type' => 'listPic_m',
                //'cate' => 14,
                'sort' => [
                    'create_at' => SORT_DESC,
                    //'name' => SORT_DESC,
                ],
                'pic' => true,
                'title' =>  'News',
                //'title' => Yii::t('common', 'News'),
                'url' => Url::toRoute(['document/list', 'cate' => 14]),
                'liNum' => 4,
                'css' => ['warper' => 'box-widget index-box ', 'header' => 'with-border index-box-header', 'title' => 'index-box-title', 'icon' => 'index-box-icon bicon-news', 'body' => 'box-profile blue-border',],
            ]) */?>

        </div>
        <div class="col-md-4 wbox" style="height: 446px;">
            <?= common\widgets\box\BoxWidget::widget([
                'category' => Category::findOne(['slug' => 'news']),
                'type' => 'index-frame',
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
                <img style="width: 100%" src="<?=Url::to('@web/images/portfolio/广告a(1).jpg') ?>">
            </a>
        </div>
        <div class="col-md-6"><img style="width: 100%" src="<?=Url::to('@web/images/portfolio/广告b(1).jpg') ?>"></div>
    </div>
    <div class="row" style="margin-bottom: 25px;">
        <div class="col-md-8" style="    height: 506px;">
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
                'url' => Url::toRoute(['document/list', 'cate' => 14]),
                'css' => ['warper' => 'box-widget index-box ', 'header' => 'with-border index-box-header', 'title' => 'index-box-title', 'icon' => 'index-box-icon bicon-news', 'body' => 'box-profile blue-border',],
            ]) ?>
            <?php
            /*$achieve = new \frontend\models\Achievement();

            echo common\widgets\box\BoxWidget::widget([
                'model' => $achieve,
                'type' => 'achievement-list', 'cate' => 67, 'title' => Yii::t('common', 'Research'), 'liNum' => 7,
                //'type' => 'achievement-list', 'cate' => 67, 'title' => Yii::t('common', '科研成果'), 'liNum' => 7,
                'where' => ['cate'=>'97'],
                    'url' => Url::toRoute(['/achievement/list?sort=-id']),
                'sort' => ['id' => SORT_DESC],
                'css' => ['warper' => 'box-widget index-box blue-border', 'title' => 'index-box-title', 'header' => 'with-border index-box-header', 'icon' => 'index-box-icon bicon-bookmark', 'body' => 'box-profile',]
                ]
            );*/
            ?>
        </div>
        <div class="col-md-4 wbox" style="height: 506px;">
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
                'url' => Url::toRoute(['document/list', 'cate' => 14]),
                'css' => ['warper' => 'box-widget index-box ', 'header' => 'with-border index-box-header', 'title' => 'index-box-title', 'icon' => 'index-box-icon bicon-news', 'body' => 'box-profile blue-border',],
            ]) ?>
            <?php/*= common\widgets\box\BoxWidget::widget([
                'model'=>\common\models\Document::className(),
                //'config' => ['cate'=>14],
                'where' => ['or','cate=93','cate=94','cate=95'],
                'type' => 'listPic_m',
                //'cate' => 14,
                'sort' => [
                    'level' => SORT_DESC,
                    'create_at' => SORT_DESC,
                    //'name' => SORT_DESC,
                ],
                'pic' => true,
                //'title' => Yii::t('common', '学术活动'),
                'title' => Yii::t('common', 'Seminar'),
                'url' => Url::toRoute(['document/max-list', 'cate' => 94]),
                'liNum' => 4,
                'css' => ['warper' => 'box-widget index-box blue-border', 'title' => 'index-box-title', 'header' => 'with-border index-box-header', 'icon' => 'index-box-icon bicon-laba', 'body' => 'box-profile',]
            ]) */?>

        </div>
    </div>


</div>
<!-- End Presentation -->

<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTAINER -->

<!-- END CONTAINER -->