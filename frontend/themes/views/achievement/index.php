<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\AchievementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('common', 'Achievements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achievement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('common', 'Create Achievement'), ['create','cate'=>Yii::$app->request->get('cate')], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="table-wrap">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'author',
            'title:ntext',
            'periodical',
            'year_id',
            'year_id',
            'cate',
            // 'address',
           //'serial_number:ntext',
            // 'ei:ntext',
             //'hint:ntext',

            ['class' => 'yii\grid\ActionColumn'],

        ],
        'pager'=>[
            //'class' => \yii\widgets\LinkPager::className(),
                //'pagination' => $pages,
                'firstPageLabel'=>'首页',
                'lastPageLabel'=>'末页',
            ],

    ]); ?>

    </div>
</div>
