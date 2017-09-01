<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/7/19
 * Time: 上午12:05
 */

namespace frontend\themes\riem;

use Yii;

class Theme extends \frontend\themes\Theme
{
    public $info = [
        'author' => 'XQ',
        'id' => 'riem',
        'name' => 'riem',
        'version' => 'v1.0',
        'description' => '经管院官网',
        'keywords' => '白色 adminLTE'
    ];

    public function bootstrap()
    {
        Yii::$container->set('yii\bootstrap\BootstrapAsset', [
            //'sourcePath' => '@frontend/themes/osec/static',
            'sourcePath' => '@webroot/riem',
            'css' => [
                YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
            ]
        ]);
    }
}