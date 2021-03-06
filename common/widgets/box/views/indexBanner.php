<?php
/**
 * Created by PhpStorm.
 * User: xq
 * Date: 16-5-19
 * Time: 上午7:11
 */

use yii\helpers\Url;

?>
<!-- About Me Box -->
<div class="box <?= $css['warper'] ?>">
    <a href="<?= $url ?>" class="uppercase">
        <div class="box-header <?= $css['header'] ?>">
            <i class="<?= $css['icon'] ?>"></i>

            <h3 class="box-title <?= $css['title'] ?> "><?= $title ?> </h3>
            <div class="<?= $css['list-news-bg'] ?>"></div>
            <div class="box-tools pull-right">
                <span data-toggle="tooltip"  class="badge  index-box-more" ><?= Yii::t('common','更多') ?></span>
            </div>
        </div>
    </a>
    <div class="box-body">
        <ul class="list-group list-group-unbordered">
            <?php foreach ($ac as $m): ?>
                <li class="list-group-item">
                    <a class="box-item " style=""
                       href=" <?= Url::to(['article/view', 'id' => $m->id]) ?>">
                        <?= $m->title ?>
                    </a>
                    <span class="text-muted pull-right"
                          style="font-size: 13px"><?= Yii::$app->formatter->asDate($m->published_at, 'MM/dd') ?></span>

                </li>
            <?php endforeach; ?>
        </ul>

    </div>

    <!-- /.box-body -->
</div>
