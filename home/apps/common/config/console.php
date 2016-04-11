<?php
$db = true ?
    array_merge(require(__DIR__ . '/db-local.php')) :
    array_merge(require(__DIR__ . '/db-server.php'));
//$params = require(__DIR__ . '/params.php');

return [
    'id' => 'minimal-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    /*'params' => $params,*/
];
