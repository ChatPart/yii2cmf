<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('jiaowu', '在读博士');
$this->params['breadcrumbs'][] = $this->title;

$count = $dataProvider->getCount();
$totalCount = $dataProvider->getTotalCount();
$pages = new Pagination([ 'totalCount' =>$totalCount, 'pageSize' => 15]);
$data = $dataProvider->getModels();
?>

<div class="student-list">
    <div class="row container " style="">
        <div class="col-lg-9" >

            <div class="box box-widget">
                <div class="box-header with-border">
                    <h4 class="box-title"><?= $this->title ?></h4>
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body box-profile">

                    <?php for ($i=0;$i< $count;$i+=2 ) {?>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="attachment-block clearfix ">

                                <a href="<?=Url::to(['/student'.'/view/','id'=>$data[$i]->id])?>">

                                    <div class="attachment-img " style="overflow: hidden;max-height: 148px;">
                                        <img src="<?=$data[$i]->icon?>" style="max-width: 100%;max-height: 100%;">
                                    </div>
                                    <h4 class="attachment-heading" style="font-size: 18px;padding-left: 133px; margin-bottom: 12px;">
                                        <?=$data[$i]->name?>
                                    </h4>
                                    <p><?= $data[$i]->grade?>级 <?= $data[$i]->degree?> 预计<?= $data[$i]->due?>年毕业</p>
                                    <p><?= $data[$i]->major?> 专业</p>
                                    <p><?= $data[$i]->email?></p>

                                </a>

                            </div>
                        </div>
                            <?php if($i+1 <$count){ ?>
                        <div class="col-md-6">
                            <div class="attachment-block clearfix">
                                <a href="<?=Url::to(['/student'.'/view/','id'=>$data[$i+1]->id])?>">
                                    <div class="attachment-img " style="overflow: hidden;max-height: 148px;">
                                        <img src="<?=$data[$i+1]->icon?>" style="max-width: 100%;max-height: 100%;">
                                    </div>
                                    <h4 class="attachment-heading" style="font-size: 18px;padding-left: 133px; margin-bottom: 12px;">
                                        <?=$data[$i+1]->name?>
                                    </h4>
                                    <p><?= $data[$i+1]->grade?>级 <?= $data[$i+1]->degree?> 预计<?= $data[$i+1]->due?>年毕业</p>
                                    <p><?= $data[$i+1]->major?> 专业</p>
                                    <p><?= $data[$i+1]->email?></p>
                                </a>
                            </div>
                        </div>
                            <?php }?>
                        </div>
                    <?php } ?>
                </div>
                <div class="box-footer text-center">
                    <?= LinkPager::widget([
                        'pagination' => $pages,
                        'firstPageLabel'=>'首页',
                        'lastPageLabel'=>'末页',
                    ]);?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="col-lg-3" >
            <div class="panel panel-default ">



                <div class="panel-body ">
                    <h5>相关</h5>


                </div>

            </div>
        </div>
    </div>

</div>
