<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\team\models\DetailList */

$this->title = 'Create Detail List';
$this->params['breadcrumbs'][] = ['label' => 'Detail Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
