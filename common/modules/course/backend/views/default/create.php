<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\course\models\Course */

$this->title = Yii::t('app', 'Create Course');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-create">


    <div class="row">
        <div class="col-md-6 col-md-offset-1">
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
                        <div class="col-md-offset-1 col-md-9">
                            <?= $this->render('_form', [
                                'model' => $model,
                            ]) ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="box box-widget">
                <div class="box-header with-border " style="text-align: center">
                    <div class="box-title" >
                        <h3 class="center" ></h3>
                    </div>
                    <div class="box-tools">
                    </div>
                </div>
                <div class="box-body">


                </div>
            </div>
        </div>
    </div>


</div>
