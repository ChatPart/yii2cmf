<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/7/19
 * Time: 上午12:05
 */

namespace frontend\themes\gearblade;

use Yii;

class Theme extends \frontend\themes\Theme
{
    public $info = [
        'author' => 'xq',
        'id' => 'gearblade',
        'name' => 'gearblade',
        'version' => 'v1.0',
        'description' => '归锋官网主题',
        'keywords' => 'gearblade 归锋'
    ];

    /*public function bootstrap()
    {
        Yii::$container->set('yii\bootstrap\BootstrapAsset', [
            'sourcePath' => '@frontend/themes/gearblade/static',
            'css' => [
                YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
            ]
        ]);
    }*/
}