<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cate */

$this->title = '更新栏目: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

//$cur_cate = Yii::$app->request->get('pre_cate');
$cates = \common\models\Cate::findAll(['status'=>1]); //所有栏目
$list =[];
foreach($cates as $v){
    $list[$v->id]=$v->name;
}
$list[0]= '基础';
?>
<div class="cate-update">

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
                                'list' => $list,
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
                    <?= Html::a('添加子栏目', ['create','pre_cate'=>isset($_GET['id'])?$_GET['id']:1], ['class' => 'btn bg-purple btn-flat margin']) ?>

                    <?php if($model->type == \common\models\Cate::TYPE_document){ ?>
                        <?= Html::a('编辑文本内容' ,
                            $model->isNewRecord ? ['/document/create-info', 'cate' => $model->id] : ['/document/update-info', 'cate' => $model->id],
                            ['class' => 'btn btn-primary btn-flat margin']) ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>
