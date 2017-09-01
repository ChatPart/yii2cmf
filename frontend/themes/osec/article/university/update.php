<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model osec\models\University */

$this->title = Yii::t('osec', 'Update {modelClass}: ', [
    'modelClass' => 'University',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('osec', 'Universities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('osec', 'Update');

$this->registerCssFile('@web/plugins/treeview/bootstrap-treeview.css',['depends'=>['yii\bootstrap\BootstrapAsset']]);
$this->registerJsFile('@web/plugins/treeview/bootstrap-treeview.js',['depends'=>['yii\web\JqueryAsset']]);
/*$js = "
var cate_url = '".\yii\helpers\Url::toRoute('cate/tree').'\';';*/
$cate_url = \yii\helpers\Url::toRoute('cate/tree');
$pre_cate = $model->category;
$js = <<<JS


let window.pre_cate = {$pre_cate} ;
var cate_url = {$cate_url} ;


JS;

$this->registerJs($js,\yii\web\View::POS_HEAD);
$this->registerJsFile('@web/plugins/treeview/treeview-demo.js',['depends'=>['yii\web\JqueryAsset'],'position'=>\yii\web\View::POS_END]);

?>
<div class="university-update">

    <div class="row">
        <div class="col-md-8 ">
            <div class="box box-widget">
                <div class="box-header with-border " style="text-align: center">
                    <div class="box-title" >
                        <h3 class="center" ><?= Html::encode(Yii::t('osec',$this->title)) ?></h3>
                    </div>
                    <div class="box-tools">
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class=" col-md-12">
                            <?= $this->render('_form', [
                                'model' => $model,
                            ]) ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="box box-widget">
                <div class="box-header with-border " style="text-align: center">
                    <div class="box-title" >
                        <h3 class="center" ></h3>
                    </div>
                    <div class="box-tools">
                    </div>
                </div>
                <div class="box-body">
                    <?= Html::a('添加文章', ['/cate/create','pre_cate'=>$model->category,'config'=>['type'=>\common\models\Cate::TYPE_document] ], ['class' => 'btn bg-purple btn-flat margin']) ?>

                        <?= Html::a('编辑文本内容' ,
                            $model->isNewRecord ? ['/document/create-info', 'cate' => $model->id] : ['/document/update-info', 'cate' => $model->id],
                            ['class' => 'btn btn-primary btn-flat margin']) ?>

                    <?= Html::a('删除', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>

                </div>
            </div>
            <div class="box float-e-margins">
                <div class="box-header">
                    <h3 class="box-title">栏目 <small></small></h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body ">
                    <div id="jstree1" data-cate=<?= $model->category ?>>
                    </div>

                    <div id="treeview12" class="test"></div>
                </div>
            </div>
        </div>
    </div>

</div>
