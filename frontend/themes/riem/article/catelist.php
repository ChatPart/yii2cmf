<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $models array */
/* @var $pages array */
/* @var $hotTags array */
/* @var $categorys array */
if (isset($category)) {
    $this->title = $category->title;
    $this->params['breadcrumbs'][] = $category->title;
    list($this->title, $this->params['SEO_SITE_KEYWORDS'], $this->params['SEO_SITE_DESCRIPTION']) = $category->getMetaData();
} elseif (isset($tag)) {
    $this->title = $tag->name;
    $this->params['breadcrumbs'][] = $tag->name;
} else {
    $this->title = '文章';
    $this->params['breadcrumbs'][] = $this->title;
}

?>
<section class="main-container">
    <div class="container">
        <div class="row">
            <div class=" col-lg-3">
                <div class="box box-widget">
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <?php foreach($categorys as $v){
                                if ($v->title ==$category->title){
                                    $active ='active';
                                }else{
                                    $active ='';
                                }
                                ?>
                                <li class="<?=$active?>"><a href="<?=Url::to(['article/catelist','cate'=>$v->slug]) ?>">
                                        <i class="fa fa-graduation-cap"></i>
                                        <?=$v->title?>
                                    </a></li>
                            <?php } ?>
                        </ul>

                    </div>
                </div>

                <?= \common\modules\area\widgets\AreaWidget::widget([
                    'slug' => 'article-index-sidebar',
                    "blockClass" => "panel panel-default",
                    "headerClass" => "panel-heading",
                    "bodyClass" => "panel-body",
                ]) ?>
                <div class="block clearfix">
                    <div class="tags-cloud">
                        <?php foreach($hotTags as $tag): ?>
                            <div class="tag">
                                <a class="label label-<?= $tag->level ?>" href="<?= Url::to(['article/tag', 'name' => $tag->name])?>">
                                    <?= $tag->name ?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
            <div class="col-lg-9">
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <h4 class="box-title"><?= $this->title ?></h4>
                        <div class="box-tools pull-right">

                        </div>
                    </div>
                    <div class="box-body box-profile block-list">
                        <?php foreach ($dataProvider->getModels() as $m): ?>
                        <div class="attachment-block ">
                            <?php if(!empty($m->cover)){ ?>
                            <img class="attachment-img" src="<?=$m->cover?>" alt="">
                            <?php } ?>
                            <div class="attachment-pushed">
                                <h4 class="attachment-heading listpic-text" style="font-size: 15px; height: 22px;white-space: nowrap;
text-overflow: ellipsis;">
                                    <a href="<?=Url::to(['article/view','id'=>$m->id])?>"><?=$m->title?></a>
                                </h4>

                                <div class="attachment-text listpic-text" style="height: 40px;">
                                    <?=$m->description?>
                                </div>
                            </div>

                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="box-footer text-center">

                            <?= \yii\widgets\LinkPager::widget([
                                'pagination' => $dataProvider->pagination,
                                'nextPageLabel' => '下一页',
                                'prevPageLabel' => '上一页',
                                'maxButtonCount' => 0,
                                'prevPageCssClass' => 'previous',
                                'nextPageCssClass' => 'next',
                                'options' => ['class' => 'pager'],
                            ]); ?>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>