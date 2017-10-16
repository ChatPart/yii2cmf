<?php

return [
    'vendorPath' => '@root/vendor',
    'runtimePath' => '@app/runtime',
    'timezone' => 'PRC',
    'language' => 'zh-CN',
    /*'sourceLanguage' => 'zh-CN',
    'language' => 'en-US',*/
    'bootstrap' => [
        'log',
        'common\\components\\LoadModule',
        'common\\components\\LoadPlugin',
    ],
    'components' => [
        'mongodb' => [
            /*'class' => '\yii\mongodb\Connection',
            //'dsn' => 'mongodb://developer:password@localhost:27017/mydatabase',
            'dsn' => 'mongodb://yii:yii@localhost:27017/oa',*/
            'class' => 'yii\mongodb\Connection',
            // 有账户的配置
            //'dsn' => 'mongodb://username:password@localhost:27017/datebase',
            //'dsn' => 'mongodb://gl:gl@119.23.134.248:27017/oa',
            'dsn' => 'mongodb://gl:gl@119.23.134.248:27017/oa',
            // 无账户的配置
            //'dsn' => 'mongodb://127.0.0.1:27017/oa',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@root/cache',
            'dirMode' => 0777 // 防止console生成的目录导致web账户没写权限
        ],
        'formatter' => [
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm',
            'timeFormat' => 'HH:mm',
            'decimalSeparator' => '.',
            'thousandSeparator' => ' ',
            'currencyCode' => 'CNY',
        ],
        'log' => [
            'targets' => [
                'db'=>[
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['warning', 'error'],
                    'except'=>['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                    'prefix'=>function () {
                        $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                        return sprintf('[%s][%s]', Yii::$app->id, $url);
                    },
                    'logVars'=>[],
                    'logTable'=>'{{%system_log}}'
                ],
            ]
        ],
        'notify' => 'common\components\notify\Handler',
        'moduleManager' => [
            'class' => 'common\\components\\ModuleManager'
        ],
        'pluginManager' => [
            'class' => 'common\components\PluginManager',
        ],
    ],
];
