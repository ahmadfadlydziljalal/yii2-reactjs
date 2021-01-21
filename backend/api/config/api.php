<?php
$params = require(__DIR__ . '/params.php');

return [
    'id' => 'basic',
    'basePath' => dirname(__DIR__) . '/..',
    'bootstrap' => [
        'log',
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // only support DbManager
            'defaultRoles' => ['user-default']
        ],
        'cache' => ['class' => 'yii\caching\FileCache',],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'mdm\admin\models\User',
            'enableAutoLogin' => false,
            'enableSession' => false,
            'loginUrl' => null,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@app/runtime/logs/api.log',
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/auth' => 'v1/auth'
                    ],
                    'patterns' => [
                        'GET index' => 'index',
                    ],
                    'pluralize' => false,
                ],
            ],
        ],
        'db' => require(__DIR__ . '/../../config/db.php'),
    ],
    'modules' => [
        'v1' => [
            'basePath' => '@app/api/modules/v1',
            'class' => 'app\api\modules\v1\Module'
        ],
    ],
    'params' => $params,
];
