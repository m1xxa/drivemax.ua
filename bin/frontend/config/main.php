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
            'baseUrl' => '',
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


        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'catalog/index',
                'catalog' => 'catalog/index',
                'cart' => 'catalog/cart',
                'order' => 'catalog/order',
                'catalog/cart-clear' => 'catalog/cart-clear',
                'catalog/filter/<letter:[\w]+>' => 'catalog/filter',
                'catalog/create-order' => 'catalog/create-order',
                'catalog/delete/<id:[\d]+>' => 'catalog/delete-from-cart',
                'catalog/addToCart/<product_id:[\d]+>' => 'catalog/add-to-cart',
                'catalog/<category:[\w-]+>' => 'catalog/view-category',
                'catalog/<category:[\w-]+>/<subcategory:[\w-]+>' => 'catalog/view-subcategory',
                'catalog/<category:[\w-]+>/<subcategory:[\w-]+>/<product:[\w-]+>' => 'catalog/view-product',
            ],
        ],
      
    ],
    'params' => $params,
];
