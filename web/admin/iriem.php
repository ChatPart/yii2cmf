<?php
require __DIR__.'/../../vendor/autoload.php';

//require __DIR__.'/../../Yii.php';
require __DIR__ . '/../../env/iriem/Yii.php';

// Config
require __DIR__.'/../../common/config/bootstrap.php';
require __DIR__.'/../../backend/config/bootstrap.php';

//
/*if (!checkInstalled()) {
    header("Location:../install.php");
    die;
}*/

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__.'/../../common/config/main.php'),
    require(__DIR__.'/../../common/config/main-local.php'),
    require(__DIR__.'/../../backend/config/main.php'),
    require(__DIR__.'/../../backend/config/main-local.php')
);
(new yii\web\Application($config))->run();
