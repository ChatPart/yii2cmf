<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '办公室工作人员';
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

<div class="container assistant">
    <div class=" text-center">
        <h2 class="heading"><?= $this->title ?> <span class="divider-center"></span></h2>
    </div>
    <div class="row leader-block" >

        <div class="col-md-3  col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                        <h5 class="leader-username ">刘楠</h5>
                        <h6 class="leader-info ">柳林校区格致楼12楼1213A</h6>
                        <p class="leader-info">liunan@swufe.edu.cn</p>
                        <p class="leader-info">（028）87092520</p>
                </div>
            </div>
        </div>
        <div class="col-md-3  col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                        <h5 class="leader-username ">李琳琳</h5>
                        <h6 class="leader-info ">柳林校区格致楼12楼1213A</h6>
                        <p class="leader-info">lill0256@swufe.edu.cn</p>
                        <p class="leader-info">（028）87092521</p>
                </div>
            </div>
        </div>
        <div class="col-md-3  col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <h5 class="leader-username ">倪倩</h5>
                    <h6 class="leader-info ">柳林校区格致楼12楼1224</h6>
                    <p class="leader-info">niqian@swufe.edu.cn</p>
                    <p class="leader-info">（028）87092471</p>
                </div>
            </div>
        </div>

        <div class="col-md-3  col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <h5 class="leader-username ">苏明淘</h5>
                    <h6 class="leader-info ">柳林校区格致楼12楼1212B</h6>
                    <p class="leader-info">sumingtao@swufe.edu.cn</p>
                    <p class="leader-info">（028）87092826</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row leader-block" >
        <div class="col-md-3  col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <h5 class="leader-username ">邵怡</h5>
                    <h6 class="leader-info ">柳林校区格致楼12楼1212B</h6>
                    <p class="leader-info">shaoy@swufe.edu.cn</p>
                    <p class="leader-info">（028）87092822</p>
                </div>
            </div>
        </div>
        <div class="col-md-3  col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <h5 class="leader-username ">吴菲</h5>
                    <h6 class="leader-info ">柳林校区格致楼12楼1224</h6>
                    <p class="leader-info">wufei@swufe.edu.cn</p>
                    <p class="leader-info">（028）87092829</p>
                </div>
            </div>
        </div>
        <div class="col-md-3  col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <h5 class="leader-username ">吴蓉婧</h5>
                    <h6 class="leader-info ">柳林校区格致楼12楼1224</h6>
                    <p class="leader-info">wrjing@swufe.edu.cn</p>
                    <p class="leader-info">（028）87092548</p>
                </div>
            </div>
        </div>
        <div class="col-md-3  col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <h5 class="leader-username ">伍筱婧</h5>
                    <h6 class="leader-info ">柳林校区格致楼12楼1213A</h6>
                    <p class="leader-info">xiaojingwu@swufe.edu.cn</p>
                    <p class="leader-info">（028）8709252</p>
                </div>
            </div>
        </div>
        </div>
    <div class="row leader-block" >

        <div class="col-md-3  col-sm-3 ">
            <div class="box box-solid">
                <div class="box-body with-border">
                        <h5 class=" leader-username ">程娟</h5>
                        <h6 class="leader-info ">柳林校区格致楼12楼1212B</h6>
                        <p class="leader-info">Juancheng2016@qq.com</p>
                        <p class="leader-info">（028）87092963</p>
                </div>
            </div>
        </div>
        <div class="col-md-3  col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <h5 class="leader-username ">曾月</h5>
                    <h6 class="leader-info ">柳林校区格致楼12楼1212B</h6>
                    <p class="leader-info">yue_zeng@swufe.edu.cn</p>
                    <p class="leader-info">（028）87092963</p>
                </div>
            </div>
        </div>
        <div class="col-md-3  col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <h5 class="leader-username ">苏之航</h5>
                    <h6 class="leader-info ">柳林校区格致楼12楼1224</h6>
                    <p class="leader-info">suzh@swufe.edu.cn</p>
                    <p class="leader-info">（028）87092529</p>
                </div>
            </div>
        </div>

        <div class="col-md-3  col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <h5 class="leader-username ">张丹</h5>
                    <h6 class="leader-info ">柳林校区格致楼12楼1213A</h6>
                    <p class="leader-info">zhangdan@swufe.edu.cn</p>
                    <p class="leader-info">（028）87081615</p>
                </div>
            </div>
        </div>
        <div class="col-md-3  col-sm-3 ">

            <div class="box box-solid">
                <div class="box-body with-border">
                    <h5 class="leader-username ">彭迎春</h5>
                    <h6 class="leader-info ">柳林校区格致楼12楼1212B</h6>
                    <p class="leader-info">pyc@swufe.edu.cn</p>
                    <p class="leader-info">（028）87092823</p>
                </div>
            </div>
        </div>

    </div>

</div>

