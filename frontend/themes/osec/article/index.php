<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $models array */
/* @var $pages array */
/* @var $hotTags array */
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
            <div class="col-lg-8">
                <?php foreach ($dataProvider->getModels() as $m): ?>
                    <article class="clearfix blogpost object-non-visible" data-animation-effect="fadeInUpSmall"
                             data-effect-delay="200">
                        <div class="blogpost-body">
                            <div class="post-info">
                                <span class="day"><?=Yii::$app->formatter->asDate($m->created_at,'dd')?></span>
                                <span class="month"><?=Yii::$app->formatter->asDate($m->created_at,'M月 Y')?></span>
                            </div>
                            <div class="blogpost-content">
                                <header>
                                    <h3 class="title">
                                        <a href="<?= Url::to(['/article/view', 'id' => $m->id]) ?>"><?= $m->title ?></a>
                                    </h3>
                                    <!-- <div class="submitted"><i class="fa fa-user pr-5"></i> by <a href="#">John Doe</a></div>-->
                                </header>
                                <p><?= $m->description ?></p>
                            </div>
                        </div>
                    </article>

                <?php endforeach; ?>

                <?php if (!(new \Detection\MobileDetect())->isMobile()): ?>
                    <?= \yii\widgets\LinkPager::widget([
                        'pagination' => $dataProvider->pagination
                    ]); ?>
                <?php else: ?>
                    <?= \yii\widgets\LinkPager::widget([
                        'pagination' => $dataProvider->pagination,
                        'nextPageLabel' => '下一页',
                        'prevPageLabel' => '上一页',
                        'maxButtonCount' => 0,
                        'prevPageCssClass' => 'previous',
                        'nextPageCssClass' => 'next',
                        'options' => ['class' => 'pager'],
                    ]); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-offset-1 col-lg-3">
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
        </div>
    </div>
</section>