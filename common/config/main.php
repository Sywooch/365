<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => ['languagepicker'],
    'components' => [
         
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

        
           /* 'urlManager'=>array(
=======
           /* 'urlManager'=>array( 
>>>>>>> 7d0ff676cfca147c4f4840ca86f605c4cdaebe6e
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'module/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ],

        )*/
    ],
    'params' => [
        	'icon-framework' => 'fa',
    ],
];

