<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'PicoYii Basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'dashboard/index',
    'controllerMap' => [
        'file' => 'app\\modules\\themes\\controllers\\FileController', // use to show or download file
    ],
    'modules' => [
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module'
        ],
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
        ],
        'noty' => [
            'class' => 'lo\modules\noty\Module',
        ],
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\Module',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'enableConfirmation' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['adminpico'],
            'controllerMap' => [
                'admin' => 'app\modules\themes\controllers\AdminController',
                'settings' => 'cinghie\yii2userextended\controllers\SettingsController',
            ],
            'modelMap' => [
                'RegistrationForm' => 'cinghie\yii2userextended\models\RegistrationForm',
                'Profile' => 'cinghie\yii2userextended\models\Profile',
                'SettingsForm' => 'cinghie\yii2userextended\models\SettingsForm',
                'User' => 'cinghie\yii2userextended\models\User',
            ],
        ],
        'userextended' => [
            'class' => 'cinghie\yii2userextended\Module',
            'avatarPath' => '@webroot/img/users/',
            'avatarURL' => '@web/img/users/',
            'showTitles' => false,
        ],
    ],
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/rbac/views' => '@app/modules/themes/gentelella/users',
                    '@dektrium/user/views' => '@app/modules/themes/gentelella/users',
                    '@app/views' => '@app/modules/themes/gentelella/app'
                ]
            ]
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'YarQ6VeTM0A6Nx6VkvjclD24OntSfvDN',
        ],
        'assetManager' => [
            'linkAssets' => false,
            'appendTimestamp' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => true,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
