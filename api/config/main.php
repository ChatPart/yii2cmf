<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);
return [
    'id' => 'api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\common\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'api\common\models\User',
        ],
        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'enableStrictParsing' => true,
            //'enableStrictParsing' =>true,
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,

            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/article',
                        'v1/nav',
                        'v1/user',
                        'v1/comment',
                        'v1/max',
                        'v2/task-list',
                        'v2/task',
                        'v2/board',
                        'v2/detail-list',
                    ],
                    /*'extraPatterns' => [
                        'GET search' => 'search',
                    ],*/
                ],

                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v2/task-list',
                        'v2/task',
                        'v2/board',
                        'v2/detail-list',],
                    'extraPatterns' => [
                        'GET view' => 'view',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v2/task-list',
                        'v2/task',
                        'v2/board',
                        //'v2/detail-list',
                        ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>'
                    ],
                    /*'extraPatterns' => [
                        'PUT,PATCH {id}' => 'update',
                    ],*/
                    /*  'except' => ['delete', 'create', 'update'],
                     'extraPatterns' => [
                         'GET test' => 'test',
                     ], */
                ],
                //'<controller:\w+>/update/<id:\w+>' => '<controller>/update',
                //'<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>'
                /*'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',*/
            ],
        ],

        'request' => [
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'application/xml' => 'yii\web\JsonParser',
            ]
        ],

    ],
    'modules' => [
        'v1' => [
            'class' => '\api\modules\v1\Module'
        ],
        'v2' => [
            'class' => '\api\modules\v2\Module'
        ],
        'wechat' => [
            'class' => 'api\modules\wechat\Module',
        ],
    ],
    'params' => $params
];
