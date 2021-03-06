<?php
use yii\data\Pagination;
use yii\widgets\LinkPager;
use common\helpers\Util;
use yii\helpers\Url;
/**
 * Created by PhpStorm.
 * User: xq
 * Date: 16-7-20
 * Time: 下午4:29
 */
$this->title = Yii::t('common', 'Achievements');
$this->params['breadcrumbs'][] = $this->title;

$count = $dataProvider->getCount();
$totalCount = $dataProvider->getTotalCount();
$pages = new Pagination([ 'totalCount' =>$totalCount, 'pageSize' => 10]);
$data = $dataProvider->getModels();
?>
<div class="container" style="padding: 15px 45px;">

<div class="row" >
    <?php
    $xuesheng = $jiaoshi ='btn-default';
    if(Yii::$app->request->get('AchievementSearch')['cate'] == 97){
        $jiaoshi ='btn-info';
    }elseif (Yii::$app->request->get('AchievementSearch')['cate'] == 98){
        $xuesheng = 'btn-info';
    }
    else{
        $jiaoshi ='btn-info';
    }
    ?>
    <div class="col-md-6">
        <a class="" href="<?= Url::to(['/paper/default/list','sort'=>'-id','AchievementSearch%5Bcate%5D'=>97]) ?>">

            <button type="button" class="btn <?= $jiaoshi ?> btn-block btn-flat">
                <i class="fa  fa-university"></i>
                教师发表
            </button>
        </a>
    </div>
    <div class="col-md-6">
        <a class="" href="<?= Url::to(['/paper/default/list','sort'=>'-id','AchievementSearch[cate]'=>98]) ?>">

        <button type="button" class="btn <?= $xuesheng ?> btn-block btn-flat">
                <i class="fa fa-graduation-cap"></i>
                学生发表
            </button>
        </a>
    </div>
    <hr>
    <br>
    <div class="col-md-12">
    <!--<button type="button" class="btn btn-default btn-block col-md-6">.btn-block</button>
    <button type="button" class="btn btn-default btn-block col-md-6">.btn-block</button>-->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active tab-title"><a href="#tab_1" data-toggle="tab" aria-expanded="true">论文</a></li>
                <li class="tab-title"><a href="" aria-expanded="false">获奖</a></li>
                <li class="tab-title"><a href="#tab_3" data-toggle="tab" aria-expanded="false" >项目</a></li>
                <!--<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        Dropdown <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                    </ul>
                </li>-->
                <li class="pull-right" style="width: 50%;"> <div class="input-group input-group-sm" style="padding: 5px;">

                        <input type="text" name="table_search" class="form-control pull-right" placeholder="搜索">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-tab">
                                <tbody><tr >
                                    <th class="tab-th"># </th>
                                    <th class="tab-th">题目</th>
                                    <th class="tab-th">作者</th>
                                    <th class="tab-th">期刊</th>
                                </tr>
                                <?php foreach($data as $v){ ?>
                                    <tr>
                                        <td width=70><?= $v['year_id'] ?></td>
                                        <td><?= $v['title'] ?></td>
                                        <td><?= $v['author'] ?></td>
                                        <td><?= @$v['periodical'] ?>
                                            <br><?= @$v['serial_number'] ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                                </tbody>

                            </table>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <?= LinkPager::widget([
                                'pagination' => $pages,
                                'firstPageLabel'=>'首页',
                                'lastPageLabel'=>'末页',
                                //'linkOptions' =>['frist']
                            ]);?>
                        </div>

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                   待补充
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    待补充
                </div>

            </div>

        </div>
    </div>
</div>


</div>
