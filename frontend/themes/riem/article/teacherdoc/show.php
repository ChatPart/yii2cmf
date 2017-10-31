<?php
/*
*@author : DELL
*@time : 2016年12月1日
*展示每一本书的所有资料
*/
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\grid\Grid_sView;
use yii\grid\GridView;
use backend\models\Book;


/*
$type_arr = ['ppt'=>1,'docx'=>1,'pdf'=>false];
$type = Yii::$app->request->get('LibsSearch[type]');
$type_arr[$type] = true;
$book= backend\models\Book::findOne(['id'=>$_GET['book_id']]);
$active = ['all'=>null,'match'=>null,'team'=>null,'question'=>null,'mind'=>null];
$this->title = $book->name;*/
?>
<div class="container">
	<div class="libs-index">
        <div class=" text-center">
            <h2 class="heading"><?= $theCategory->title ?> <span class="divider-center"></span></h2>
        </div>
		<div class="nav-tabs-custom">
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'tableOptions' => [
                            'class' => 'table table-striped table-bordered lib-table'
                        ],

                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                //'class' => DataColumn::className(), // this line is optional
                                'attribute' => 'title',
                                'format' => 'raw',
                                //'label' => 'title',
                                'options'=>['class'=>'lib_name'],
                                //'contentOptions'=>['class'=>'lib_name'],
                                /*"value" => function ($model) {
                                    $html = "<p>$model->address</p>";
                                    $html.= "<p>$model->ext</p>";
                                    return $html;

                                }*/
                                "value" => function ($model) {
                                    $detail = \yii\helpers\Url::to(['view','id'=>$model->id]);
                                    $html = "<a href='$detail' target='_blank'>$model->title</a>";

                                    return $html;
                                }
                            ],
                            //'score',
                            //'uploadtime:date',
                            //'downloadtimes',
                            'user.username',

                            'data.doc.type',
                            'data.doc.size',
                            'user_id',
                            //['class' => 'common\models\grid\LibColumn'],

                            // 'summary:ntext',

                            //['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
				</div>

			</div>
		</div>


</div>
</div>