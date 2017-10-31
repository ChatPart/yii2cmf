<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '研究中心';
$this->params['breadcrumbs'][] = $this->title;
/*$a = Yii::$app->request->get('category');
$category = isset($a)?$a:39;*/
$positions = [];

foreach ($positions as $position) {
    $dataProvider = $searchModel->search(['position' => $position]);
    $models = $dataProvider->getModels();
    foreach ($models as $model) {

    }
}
?>

<div class="container">
    <div class=" text-center">
        <h2 class="heading">研究中心 <span class="divider-center"></span></h2>
    </div>
    <div class="row leader-block" >
        <?php foreach(\common\models\Nav::getNavItems('research_center') as $v): ?>

        <div class="col-md-6  col-sm-12 ">
            <div class="attachment-block " style="min-height: 80px">
                <div style="overflow: hidden;height: 68px;display: inline">
                    <img class="attachment-img" src="<?= $v->cover ?>" alt="<?= $v['title'] ?>" style="max-height:68px;max-width:95px;">
                </div>
                <div class="attachment-pushed" style="margin-left: 90px;">
                    <h3 class="attachment-heading listpic-text"
                        style="color: #16bdee; margin-top: 10px;font-size: 21px;
                        height: 42px;white-space: nowrap;text-overflow: ellipsis;">
                        <a href="<?= Url::to($v['url']) ?>"><?= $v['title'] ?></a>
                    </h3>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!--<div class="col-md-10  col-md-offset-1 col-sm-3 ">

            <div class="box box-solid" style="padding:15px">
                <div class="box-body with-border">
                    <div class="col-sm-2"><img class="img-responsive " src="/images/portfolio/img2.jpg" alt="Photo"></div>
                    <div class="col-sm-9" style="padding:0px  5px">
                        <h3 class=" " style="color: #16bdee;margin-top: 10px">西方经济与公共政策研究所</h3>

                        <p class="">  ………………………………</p>
                    </div>
                </div>
            </div>
        </div>-->

    </div>

</div>

