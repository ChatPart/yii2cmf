<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\course\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">已选课课程</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>ID</th>
                            <th>课程</th>
                            <th>教师</th>
                            <th>学院</th>
                            <th>上课时间</th>
                            <th>地点</th>

                        </tr>
                        <?php foreach($courseChoose as $choose){ ?>
                            <tr>
                                <td><?= $choose->course->id ?></td>
                                <td><?= $choose->course->title ?></td>
                                <td><?= $choose->course->teacher ?></td>
                                <td><?= $choose->course->college ?></td>
                                <td><?= $choose->course->time ?></td>
                                <td><?= $choose->course->address ?></td>
                                <td>
                                    <a href="/?r=course/course-user/delete&id=2">
                                        <button type="button" class="btn btn-block btn-danger btn-sm">delete</button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>

                        </tbody></table>


                </div>
                <!-- /.box-body -->
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">可选课课程</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            //['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'title',
                            'college',
                            'teacher',

                            'time',
                            'address',
                            'credit',
                            // 'status',
                            [
                                "label" => "操作",
                                "format" => "raw",

                                "value" => function ($model) {

                                    return '<a href="/?r=course/course-user/create&course='.$model->id.'">
                                    <button type="button" class="btn btn-block btn-primary btn-sm">choose</button>
                                </a>';
                                    //return $model->status;
                                }
                            ],
                            //['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>

                </div>
                <!-- /.box-body -->
            </div>

            <!-- /.box -->
        </div>
    </div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Course'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


</div>
