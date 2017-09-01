<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/7/19
 * Time: 上午12:05
 */

namespace frontend\themes\osec;

use Yii;

class Theme extends \frontend\themes\Theme
{
    public $info = [
        'author' => 'XQ',
        'id' => 'osec',
        'name' => 'osec',
        'version' => 'v1.0',
        'description' => 'osec主题',
        'keywords' => '红色 宽屏'
    ];

    public function bootstrap()
    {
        Yii::$container->set('yii\bootstrap\BootstrapAsset', [
            //'sourcePath' => '@frontend/themes/osec/static',
            'sourcePath' => '@webroot/osec',
            'css' => [
                YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
            ]
        ]);
    }
}