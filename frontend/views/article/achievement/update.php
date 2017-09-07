<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Achievement */

$this->title = Yii::t('common', 'Update {modelClass}: ', [
    'modelClass' => 'Achievement',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Achievements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="achievement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
