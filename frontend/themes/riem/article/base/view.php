<?php
/* @var $this yii\web\View */
/* @var $commentModel common\models\Comment */
/* @var $hots common\models\Article */
/* @var $model common\models\Article */
/* @var $next common\models\Article */
/* @var $prev common\models\Article */
/* @var $commentModels common\models\Comment */

/* @var $pages yii\data\Pagination */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => $model->category, 'url' => ['/article/index', 'cate' => \common\models\Category::find()->where(['id' => $model->category_id])->select('slug')->scalar()]];
$this->params['breadcrumbs'][] = Html::encode($model->title);
$this->params['model'] = $model;


list($this->title, $this->params['SEO_SITE_KEYWORDS'], $this->params['SEO_SITE_DESCRIPTION']) = $model->getMetaData();
?>
<section class="main-container">

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!--内容-->
                <div class="view-content">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="title"><?= $model->title ?></h3>
                            <div class="author clearfix author-right">
                                <span class="name" style="margin-right: 1em;"><?= Html::icon('clock-o')?> <?= date('Y-m-d', $model->created_at) ?></span>
                                <span class="from"><?= Html::icon('eye')?> <?= $model->trueView?>次浏览</span>
                            </div>
                        </div>
                        <div class="box-body text-center">
                            <?= \yii\helpers\HtmlPurifier::process($model->data->processedContent) ?>
                        </div>
                    </div>

                </div>
                <?php if (!empty($model->source)): ?>
                    <div class="well well-sm">原文链接: <?= $model->source ?></div><?php endif; ?>
                <nav>
                    <ul class="pager">
                        <?php if ($prev != null): ?>
                            <li class="previous"><a href="<?= Url::to(['view', 'id' => $prev->id]) ?>">&larr; 上一篇</a>
                            </li>
                        <?php else: ?>
                            <li class="previous"><a href="javascript:;">&larr; 已经是第一篇</a></li>
                        <?php endif; ?>
                        <?php if ($next != null): ?>
                            <li class="next"><a href="<?= Url::to(['view', 'id' => $next->id]) ?>">下一篇 &rarr;</a></li>
                        <?php else: ?>
                            <li class="next"><a href="javascript:;">已经是最后一篇 &rarr;</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!--分享-->
                <?= \common\widgets\share\Share::widget() ?>
                <!-- 评论   -->

            </div>
            <div class="col-lg-3">
                <div class="block clearfix">
                    <div class="tags-cloud">
                        <?php foreach ($model->tags as $tag): ?>
                            <div class="tag">
                                <a class="label label-<?= $tag->level ?>"
                                   href="<?= Url::to(['article/tag', 'name' => $tag->name]) ?>">
                                    <?= $tag->name ?>
                                </a>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h4 class="panel-header text-center">热门讯息</h4>
                    </div>
                    <div class="box-body text-center">
                        <ul class="list-unstyled hot ">
                            <?php foreach ($hots as $item): ?>
                                <li>
                                    <?= Html::a($item->title, ['/article/view', 'id' => $item->id]) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>

<?php $this->registerJs("$('.view-content a').attr('target', '_blank');") ?>
