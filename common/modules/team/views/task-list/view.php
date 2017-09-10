<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\team\models\TaskList */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Task Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => (string)$model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => (string)$model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_id',
            'title',
            'board_id',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
