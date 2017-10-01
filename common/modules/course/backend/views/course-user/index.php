<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\modules\course\models\CourseUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '选课结果');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-user-index">


<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                "label" => "学生",
                "format" => "raw",
                'attribute' => 'username',
                "value" => function ($model) {

                    return $model->user->username;

                }
            ],
            [
                "label" => "课程",
                "format" => "raw",
                'attribute' => 'course',
                "value" => function ($model) {

                    return $model->course->title;

                }
            ],

            'created_at',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
