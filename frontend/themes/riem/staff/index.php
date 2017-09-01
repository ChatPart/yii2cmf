<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staff';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Staff', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'type',
            'name',
            'tel',
            'public_email:email',
            //'icon:ntext',
            'title',
            // 'location',

            // 'education',
            // 'resume:ntext',
            // 'achievement:ntext',
            // 'created_at',
            // 'updated_at',
            // 'status',
             'gbkchart',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
