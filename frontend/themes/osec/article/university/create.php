<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model osec\models\University */

$this->title = Yii::t('osec', 'Create University');
$this->params['breadcrumbs'][] = ['label' => Yii::t('osec', 'Universities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
