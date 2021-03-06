<?php

$params = array_merge(
    require(__DIR__.'/../../common/config/params.php'),
    require(__DIR__.'/params.php')
);

return [
    'id' => 'frontend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath'=>'@common/messages',
                    'fileMap' => ['app' => 'frontend.php'],
                    'on missingTranslation' => ['\backend\modules\i18n\Module', 'missingTranslation']
                ],
            ]
        ],
        'search' => [
            'class' => 'frontend\\components\\Search',
            'engine' => env('SEARCH_ENGINE', 'local')
        ],
        /*"view" => [
            "theme" => [
                "pathMap" => [
                    '@common/user' . '/frontend/views' => '@root/frontend/themes/osec/user',

//"@app/views" => "@vendor/dmstr/yii2-lte-asset/example-views/yiisoft/yii2-app"
                    "@vendor/dektrium/yii2-user/views" => "@app/views/dektrium"
                ],
            ],
        ],*/
    ],
    'modules' => [
        'customer' => [
            'class' => 'common\modules\customer\Module',
        ],
        'team' => [
            'class' => 'common\modules\team\Module',
        ],
    ],
    'params' => $params,
];
