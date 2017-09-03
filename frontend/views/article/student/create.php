<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Student */

$this->title = Yii::t('jiaowu', 'Create Student');
$this->params['breadcrumbs'][] = ['label' => Yii::t('jiaowu', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-create">

    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="box box-widget">
                <div class="box-header with-border " style="text-align: center">
                    <div class="box-title " >
                        <h3 class="center" ><?= Html::encode($this->title) ?></h3>
                    </div>

                    <div class="box-tools">
                    </div>

                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-8">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
