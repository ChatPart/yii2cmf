<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\course\models\CourseUser */

$this->title = Yii::t('app', 'Create Course User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
