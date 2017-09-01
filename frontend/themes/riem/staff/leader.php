<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '学院领导';
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
        <h2 class="heading">学院领导 <span class="divider-center"></span></h2>
    </div>
    <div class="row leader-block" >

        <?php $leader = \frontend\models\Staff::findOne(['name'=>'甘犁']) ?>
        <div class="col-md-4 col-md-offset-2 col-sm-3 " >

            <div class="box box-solid">
                <div class="box-body with-border">
                    <div class="col-sm-5"><img class="img-responsive " src="<?= $leader->icon ?>" alt="Photo"></div>
                    <div class="col-sm-7" style="padding: 5px">
                        <h4 class="leader-username "><?= $leader->name ?><span class="leader-title">特聘院长</span></h4>
                        <h6 class="leader-info "><?= $leader->location ?></h6>
                        <p class="leader-info-p"><?= $leader->public_email ?></p>
                        <p class="leader-info-p"><?= $leader->tel ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php $leader = \frontend\models\Staff::findOne(['name'=>'李涵']) ?>
        <div class="col-md-4 col-md-offset-0 col-sm-3 " >
            <div class="box box-solid">
                <div class="box-body with-border" >
                    <div class="col-sm-5"><img class="img-responsive " src="<?= $leader->icon ?>" alt="Photo"></div>
                    <div class="col-sm-7" style="padding: 5px">
                        <h4 class="leader-username "><?= $leader->name ?><span class="leader-title">常务副院长</span>
                        </h4>
                        <h6 class="leader-info "><?= $leader->location ?></h6>
                        <p class="leader-info-p"><?= $leader->public_email ?></p>
                        <p class="leader-info-p"><?= $leader->tel ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row leader-block" >

        <?php $leader = \frontend\models\Staff::findOne(['name'=>'董艳']) ?>
        <div class="col-md-4 col-md-offset-2 col-sm-3 " >
            <div class="box box-solid">
                <div class="box-body with-border">
                    <div class="col-sm-5"><img class="img-responsive " src="<?= $leader->icon ?>" alt="Photo"></div>
                    <div class="col-sm-7" style="padding: 5px">
                        <h4 class="leader-username "><?= $leader->name ?><span class="leader-title">党总支书记</span></h4>
                        <h6 class="leader-info "><?= $leader->location ?></h6>
                        <p class="leader-info-p"><?= $leader->public_email ?></p>
                        <p class="leader-info-p"><?= $leader->tel ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php $leader = \frontend\models\Staff::findOne(['name'=>'周高蓉']) ?>
        <div class="col-md-4 col-md-offset-0 col-sm-3 " >

            <div class="box box-solid">
                <div class="box-body with-border">
                    <div class="col-sm-5"><img class="img-responsive " src="<?= $leader->icon ?>" alt="Photo"></div>
                    <div class="col-sm-7" style="padding: 5px">
                        <h4 class="leader-username "><?= $leader->name ?><span class="leader-title">党总支副书记</span></h4>
                        <h6 class="leader-info "><?= $leader->location ?></h6>
                        <p class="leader-info-p"><?= $leader->public_email ?></p>
                        <p class="leader-info-p"><?= $leader->tel ?></p>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="row leader-block" >

        <?php $leader = \frontend\models\Staff::findOne(['name'=>'何欣']) ?>
        <div class="col-md-4 col-md-offset-2 col-sm-3 " >
            <div class="box box-solid">
                <div class="box-body with-border">
                    <div class="col-sm-5"><img class="img-responsive " src="<?= @$leader->icon ?>" alt="Photo"></div>
                    <div class="col-sm-7" style="padding: 5px">
                        <h4 class="leader-username "><?= $leader->name ?><span class="leader-title">院长助理</span></h4>
                        <h6 class="leader-info "><?= $leader->location ?></h6>
                        <p class="leader-info-p"><?= $leader->public_email ?></p>
                        <p class="leader-info-p"><?= $leader->tel ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php $leader = \frontend\models\Staff::findOne(['name'=>'吴菲']) ?>
        <div class="col-md-4 col-md-offset-0 col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <div class="col-sm-5"><img class="img-responsive " src="<?= @$leader->icon ?>" alt="Photo"></div>
                    <div class="col-sm-7" style="padding: 5px">
                        <h4 class="leader-username "><?= $leader->name ?><span class="leader-title">院长助理</span></h4>
                        <h6 class="leader-info "><?= $leader->location ?></h6>
                        <p class="leader-info-p"><?= $leader->public_email ?></p>
                        <p class="leader-info-p"><?= $leader->tel ?></p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

