<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '办公室工作人员';
$this->params['breadcrumbs'][] = $this->title;
/*$a = Yii::$app->request->get('category');
$category = isset($a)?$a:39;*/
$positions = [];

foreach ($positions as $position) {
    $dataProvider = $searchModel->search(['position' => $position]);
    $models = $dataProvider->getModels();
    foreach ($models as $model) {

    }
}
?>

<div class="container assistant">
    <div class=" text-center">
        <h2 class="heading"><?= $this->title ?> <span class="divider-center"></span></h2>
    </div>

    <div class="row leader-block">
        <?php foreach ($dataProvider->models as $assistant){
            ?>
            <div class="col-md-3  col-sm-3 ">
                <div class="box box-solid assistant-block">
                    <div class="box-body with-border">
                        <img class="pull-left user-img img-circle" src=<?= $assistant->icon ?>>
                        <div class="assistant-info">
                            <h4 class=" "><?= $assistant->name ?></h4>
                            <h6 class=" "><?= $assistant->location ?></h6>
                            <p class=""><?= $assistant->public_email ?></p>
                            <p class=""><?= $assistant->tel ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}?>



    </div>

</div>

