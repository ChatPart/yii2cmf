<?php

use yii\helpers\Html;

use common\models\Category;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel osec\models\search\UniversitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('osec', '留学项目');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="main-container">

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="university-index">
                    <?php foreach ($dataProvider->getModels() as $m): ?>
                        <article class="clearfix blogpost object-non-visible" data-animation-effect="fadeInUpSmall"
                                 data-effect-delay="200">
                            <div class="blogpost-body">
                                <div class="post-info">
                                    <img style="width=80px" src="<?= $m->data->school_logo[0] ?>" />
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

                </div>
            </div>
        </div>
    </div>
</section>
