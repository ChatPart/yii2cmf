<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\helpers\Url;

//use Collator;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '教学研究人员';
$this->params['breadcrumbs'][] = $this->title;
/*$a = Yii::$app->request->get('category');
$category = isset($a)?$a:39;*/
$positions = [];

/*foreach ($positions as $position){
    $dataProvider= $searchModel->search(['position'=>$position]);
    $models = $dataProvider->getModels();
    foreach ($models as $model){

    }
}*/

/*$sort = new yii\data\Sort([
    'attributes' => [
        'title' => [
            'asc' => ['title' => SORT_ASC],
            'desc' => ['title' => SORT_DESC],
            'default' => ['title' => SORT_DESC],
            //'label' => Inflector::camel2words('age'),
        ]
    ],
]);*/
/*$dataProvider->setSort([
    'defaultOrder' => [
        //'created_at' => SORT_DESC,
        //'title' => SORT_DESC,
        //'name' =>  ['CONVERT(name USING gbk) COLLATE gbk_chinese_ci ASC' => SORT_DESC],
        'name' => [
            //'asc'  => ['CONVERT(name USING gbk)' => SORT_ASC],
            'asc' => ['CONVERT(name USING gbk) COLLATE gbk_chinese_ci ASC' => SORT_ASC],
        ],
    ]
]);
$dataProvider->sortByPinyin($dataProvider, [
'name',
]);*/
//$dataProvider->setTotalCount(100);
//$dataProvider->setSort(['defaultOrder' =>$sort->orders]);

/*$sortName = new Collator('zh-CN');
//$sortName->
foreach ((new Collator('zh-CN'))->asort($models) as $v){
echo $v->name;
}
die();*/
$dataProvider->setPagination([
    'defaultPageSize' => 20,
    //'totalCount'=>$dataProvider->getTotalCount(),
    //'pageSizeLimit'=>$dataProvider->getTotalCount()
]);
$count = $dataProvider->count;
$pages = new \yii\data\Pagination(['totalCount' => $dataProvider->getTotalCount(), 'pageSize' => 20]);
/*$sort = new \yii\data\Sort([
            'attributes' => [
                //'title',
                'name' => [
                    'asc' => ['title'=> SORT_ASC,'CONVERT(name USING gbk)' => SORT_ASC, 'level'=>SORT_ASC],
                    'desc' => ['title'=> SORT_DESC,'CONVERT(name USING gbk)' => SORT_DESC, 'level'=>SORT_DESC],
                    'default' => SORT_ASC,
                    'label' => 'Name',
                ],
            ],
        ]);
$dataProvider->sort = $sort;*/
//$dataProvider->filterModel = $searchModel;
$models = $dataProvider->getModels();
//var_dump($dataProvider->getSort());die();
?>
<div class="container">
    <div class=" text-center">
        <h2 class="heading"><?= $this->title ?> <span class="divider-center"></span></h2>
    </div>
    <div class="row leader-block" style="padding: 20px">
        <div class="col-md-3 ">
            <div class="box box-solid">
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                            <a href="#" class=""><i class="fa fa-filter"></i> 总 共
                                <span
                                    class="label label-warning margin"><?= $dataProvider->getTotalCount() ?></span></a>
                        </li>
                        <li class=""><a class=""
                                        href="<?= \yii\helpers\Url::toRoute(['/staff/default/staff', 'sort' => 'name', 'StaffSearch' => ['type' => '全职教师']]) ?>"><i
                                    class="fa fa-inbox"></i> 全 职
                                <!--<span class="label label-primary pull-right">12</span>--></a>
                        </li>
                        <li><a class="" href="#"><i class="fa fa-envelope-o"></i> 兼 职</a></li>
                        <li><a class="" href="#"><i class="fa fa-file-text-o"></i> 客 座</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 ">
            <div class="box box-solid">
                <div class="box-header">
                    <h4 class="" style="padding: 0 5px;    color: #adadad;">按拼音查找</h4>
                </div>
                <div class="box-body table-responsive pad gbkchart ">

                    <div class="btn-group ">
                        <?php
                        $staffType = Yii::$app->request->get('StaffSearch')['type'];

                        $list = [
                            '全职教师'=>'全职教师',
                            '客座教授'=>'客座教授',
                            '兼职教授'=>'兼职教授',
                            '办公室工作人员'=>'办公室工作人员',
                            '其他'=>'其他'];
                        if($staffType!= '全职教师' || $staffType!= '客座教授' || $staffType!= '兼职教授' || $staffType!= ''){
                            $staffType = '';
                        }

                        $activeChart = isset(Yii::$app->request->get('StaffSearch')['gbkchart']) ? Yii::$app->request->get('StaffSearch')['gbkchart'] : null;
                        //var_dump($activeChart);die();
                        $status = 'btn-default';
                        for ($i = 65; $i < 85; $i++) {
                            $char = strtoupper(chr($i));
                            if ($activeChart == $char) {
                                $status = 'btn-info';
                            }
                            ?>
                            <a class="btn <?= $status ?>"
                               href=<?= \yii\helpers\Url::toRoute(['/staff/default/staff',
                                'sort' => 'name',
                                'StaffSearch' => ['type' => $staffType, 'gbkchart' => $char]
                            ]) ?>>
                                <?= $char ?>
                            </a>
                            <?php
                            $status = 'btn-default';
                        }
                        ?>
                    </div>


                    <div class="btn-group" style="margin-top: 9px">
                        <?php
                        //$staffType = Yii::$app->request->get('StaffSearch')['type'];
                        for ($i = 85; $i < 91; $i++) {
                            $char = strtoupper(chr($i));
                            if ($activeChart == $char) {
                                $status = 'btn-info';
                            }
                            ?>
                            <a class="btn <?= $status ?>"
                               href=<?= \yii\helpers\Url::toRoute(['/staff/default/staff', 'sort' => 'name', 'StaffSearch' => ['type' => $staffType, 'gbkchart' => $char]]) ?>>
                                <?= $char ?>
                            </a>
                            <?php
                            $status = 'btn-default';
                        }
                        ?>
                    </div>

                </div>
            </div>
            <div class="box box-solid">
                <div class="box-body ">
                    <div class="row">
                        <div class="col-md-6 col-sm-3 ">
                            <ul class="menu">
                                <?php for ($i = 0; $i < $count; $i += 2) { ?>
                                    <li class="staff">
                                        <a href="<?= \yii\helpers\Url::to(['/staff/default/view', 'id' => $models[$i]->id]) ?>">
                                            <!--<div class="pull-left">
                                                <img src="/adminlte/dist/img/user3-128x128.jpg" class="img-circle user-icon" alt="User Image">
                                            </div>-->
                                            <h4>
                                                <?= $models[$i]->name ?>
                                                <small><?= $models[$i]->title ?></small>
                                            </h4>
                                        </a>
                                        <p><?= $models[$i]->public_email ?></p>
                                    </li>
                                    <?php
                                } ?>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-3 ">
                            <ul class="menu">
                                <?php for ($i = 1; $i < $count; $i += 2) {
                                    ?>
                                    <li class="staff">
                                        <a href="<?= \yii\helpers\Url::to(['/staff/default/view', 'id' => $models[$i]->id]) ?>">
                                            <!--<div class="pull-left">
                                                <img src="/adminlte/dist/img/user3-128x128.jpg" class="img-circle user-icon" alt="User Image">
                                            </div>-->
                                            <h4>
                                                <?= $models[$i]->name ?>
                                                <small><?= $models[$i]->title ?></small>
                                            </h4>

                                        </a>
                                        <p><?= $models[$i]->public_email ?></p>
                                    </li>
                                    <?php
                                } ?>

                            </ul>
                        </div>
                    </div>
                    <div class="box-footer">
                        <?= LinkPager::widget([
                            'pagination' => $pages,
                        ]); ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
