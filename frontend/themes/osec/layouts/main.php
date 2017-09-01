<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\themes\osec\assets\AppAsset;
use frontend\themes\osec\assets\IdeaAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

IdeaAsset::register($this);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => isset($this->params['SEO_SITE_KEYWORDS']) ? $this->params['SEO_SITE_KEYWORDS'] : Yii::$app->config->get('SEO_SITE_KEYWORDS')
], 'keywords');
$this->registerMetaTag([
    'name' => 'description',
    'content' => isset($this->params['SEO_SITE_DESCRIPTION']) ? $this->params['SEO_SITE_DESCRIPTION'] : Yii::$app->config->get('SEO_SITE_DESCRIPTION')
], 'description');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link type="image/x-icon" href="<?= Yii::getAlias('@web') ?>favicon.ico" rel="shortcut icon">
    <script>var SITE_URL = '<?= Yii::$app->request->hostInfo . Yii::$app->request->baseUrl ?>';</script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<?= $this->render(
    'header-top.php'
    //['directoryAsset' => $directoryAsset]
) ?>

<?= $this->render(
    'header_nav.php'
) ?>
<?= \common\widgets\Alert::widget()?>

<?= $this->render(
    'content.php',['content'=>$content]
) ?>

<?= $this->render(
    'footer.php'
) ?>

<!--回到顶部-->
<?= \common\widgets\scroll\Scroll::widget()?>
<?= Yii::$app->config->get('FOOTER')?>

<?php $this->endBody() ?>
<?php if (isset($this->blocks['js'])): ?>
    <?= $this->blocks['js'] ?>
<?php endif; ?>
</body>
</html>
<?php $this->endPage() ?>
