<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['languagepicker'],
    'components' => [
        'assetManager' => [
            'bundles' => [ 
                'yii\jui\JuiAsset' => [
                    'css' => [
                        'themes/custom365/jquery-ui.css',
                    ],
                    
            
],
                'dosamigos\google\maps\MapAsset' => [
                'options' => [
                    'key' => 'AIzaSyBB19cyGLWQeSz1amgo9wJN6ZeXlQtHZCU',
                    'language' => 'id',
                    'version' => '3.1.18'
                ]
            ]
                ] ],
         'formatter' => 
            [
               'defaultTimeZone' => 'UTC+4',
               'timeZone' => 'Asia/Baku',
               'dateFormat' => 'php:d-m-Y',
               'datetimeFormat'=>'php:d-M-Y',
               'datetimeFormat'=>'php:d-M-Y H:i:s'
            ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'languagepicker' => [
        'class' => 'lajax\languagepicker\Component',
        'languages' => ['az' => 'AZ','en' => 'EN', 'ru' => 'RU'],     // List of available languages
        'cookieName' => 'language',                     // Name of the cookie.
        // 'cookieDomain' => 'e-tap.az',                // Domain of the cookie.
        'expireDays' => 64,                             // The expiration time of the cookie is 64 days.
           
       ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
            'urlManager'=>array( 
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            
            'rules' => [
                
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'module/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ],

        )
    ],
    'params' => [
        	'icon-framework' => 'fa',
    ],
];

