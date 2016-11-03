<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        //http://drivemax.ua/
        //http://drivemax.ua/catalog/
        //http://drivemax.ua/catalog/audi/
        //http://drivemax.ua/catalog/audi/100_82_90/
        //http://drivemax.ua/catalog/audi/100_82_90/bamper_peredniy/

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'cart' => 'catalog/cart',
                'catalog/cart-clear' => 'catalog/cart-clear',
                'catalog' => 'site/index',
                'catalog/addToCart/<product_id:[\d]+>' => 'catalog/add-to-cart',
                'catalog/<category:[\w-]+>' => 'catalog/view-category',
                'catalog/<category:[\w-]+>/<subcategory:[\w-]+>' => 'catalog/view-subcategory',
                'catalog/<category:[\w-]+>/<subcategory:[\w-]+>/<product:[\w-]+>' => 'catalog/view-product',
            ],
        ],
      
    ],
    'params' => $params,
];
