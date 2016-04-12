<?php require_once( __DIR__ . DIRECTORY_SEPARATOR . 'aliases.php');
$db = true ?
    array_merge(require(__DIR__ . '/db-local.php')) :
    array_merge(require(__DIR__ . '/db-server.php'));
/*$params = require(__DIR__ . '/params.php');*/

return [
    'id' => 'srp-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'apps\\common\\commands',
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
