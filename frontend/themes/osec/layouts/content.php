<?php
use yii\widgets\Breadcrumbs;

use yii\helpers\Url;
use common\models\cate;
use yii\helpers\Html;

?>

<?php
if (!isset($this->params['no_banner'])) { ?>
    <section class="content-header container">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <?= $this->blocks['content-header'] ?>
        <?php } else {
            if ($this->title !== null) {
                //echo \yii\helpers\Html::encode($this->title);
            } else {
                echo \yii\helpers\Inflector::camel2words(
                    \yii\helpers\Inflector::id2camel($this->context->module->id)
                );
                echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
            }
        } ?>
    </section>
    <div class="banner">
        <div class="fixed-image section dark-translucent-bg" style="background-image:url('<?= isset($this->params['banner']['pic'])?$this->params['banner']['pic']:'/osec/images/portfolio/default_img.png' ?>');">
            <div class="container">
                <div class="space-top" style="padding-top: 124px;"></div>
                <div class="space-top"></div>
                <div class="space-top"></div>
                <h1><?= $this->title ?></h1>
                <div class="separator-2"></div>
                <p class="lead">
                    <?= @$this->params['banner']['subhead']?:'' ?>
                    <!--<br class="hidden-xs hidden-sm">
                    hic officiis illo dolore sunt assumenda saepe id commodi sint praesentium
                    <br class="hidden-xs hidden-sm">
                    natus laborum quas cumque facilis, suscipit aliquam dolorum.-->
                </p>
            </div>
        </div>
    </div>

<?php } ?>

<?php
if (!isset($this->params['no_breadcrumb'])) { ?>

    <div class="page-intro">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?=
                    Breadcrumbs::widget(
                        [
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]
                    ) ?>
                </div>
                <?php
                //var_dump($this->params['model']);die();
                if(isset($this->params['model'])){ ?>
                    <div class="col-md-3">
                        <div class="action" style="padding: 6px 0 0;">

                        <span class="time"><?= Html::icon('clock-o')?>
                            <?= date('Y-m-d', @$this->params['model']->created_at)?: ''?>
                        </span>
                            <span class="views">
                            <?= Html::icon('eye')?> <?= @$this->params['model']->trueView?: '' ?>次浏览
                        </span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<?= \common\widgets\Alert::widget()?>

<?= $content ?>


