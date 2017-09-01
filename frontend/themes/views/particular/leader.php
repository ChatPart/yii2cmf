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

        <div class="col-md-4 col-md-offset-4 col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <div class="col-sm-6"><img class="img-responsive " src="/images/staff/t1.jpg" alt="Photo"></div>
                    <div class="col-sm-6" style="padding: 5px">
                        <h4 class="leader-username ">甘犁<span class="leader-title">院长</span></h4>
                        <h6 class="leader-info ">柳林校区格致楼12楼1202室</h6>
                        <p class="leader-info-p">ganl@swufe.edu.cn</p>
                        <p class="leader-info-p">（028）87099193</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row leader-block" >

        <div class="col-md-4 col-md-offset-2 col-sm-3 fgrids">
            <div class="box box-solid">
                <div class="box-body with-border" >
                    <div class="col-sm-6"><img class="img-responsive " src="/images/staff/t1.jpg" alt="Photo"></div>
                    <div class="col-sm-6" style="padding: 5px">
                        <h4 class="leader-username ">李涵<span class="leader-title">常务副院长</span>
                        </h4>
                        <h6 class="leader-info ">柳林校区格致楼12楼1209室</h6>
                        <p class="leader-info-p">hli@swufe.edu.cn</p>
                        <p class="leader-info-p">（028）87092106</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4  col-sm-3 fgrids">
            <div class="box box-solid">
                <div class="box-body with-border">
                    <div class="col-sm-6"><img class="img-responsive " src="/images/staff/t1.jpg" alt="Photo"></div>
                    <div class="col-sm-6" style="padding: 5px">
                        <h4 class="leader-username ">董艳<span class="leader-title">党总支书记</span></h4>
                        <h6 class="leader-info">柳林校区格致楼12楼1210B室</h6>
                        <p class="leader-info-p">ydong@swufe.edu.cn</p>
                        <p class="leader-info-p">（028）87092167</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-md-offset-2 col-sm-3 fgrids">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <div class="col-sm-6"><img class="img-responsive " src="/images/staff/t1.jpg" alt="Photo"></div>
                    <div class="col-sm-6" style="padding: 5px">
                        <h4 class="leader-username ">周高蓉<span class="leader-title">党总支副书记</span></h4>
                        <h6 class="leader-info ">柳林校区格致楼12楼1203A</h6>
                        <p class="leader-info-p">zhougr@swufe.edu.cn</p>
                        <p class="leader-info-p">（028）87092099</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

