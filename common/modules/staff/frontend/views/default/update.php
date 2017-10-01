<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Staff */

$this->title = 'Update Staff: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="staff-update">

        <div class="row">
            <div class="col-md-10">
                <div class="box box-widget">
                    <div class="box-header with-border " style="text-align: center">
                        <div class="box-title" >
                            <h3 class="center" ><?= Html::encode(Yii::t('model/pic',$this->title)) ?></h3>
                        </div>
                        <div class="box-tools">
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
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
