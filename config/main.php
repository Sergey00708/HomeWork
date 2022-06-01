<?php

return [
    'app_name' => 'Test framework',
    'components' => [
        'router' => [
//            'class' => \Sergey\Framework\Components\Router::class,
        'factory' => \Sergey\Framework\Components\Routing\RouterFactory::class,
        ],
        'cache' => [
//            'class' => \Sergey\Framework\Components\Cache::class,
        'factory' => \Sergey\Framework\Components\Cache\CacheFactory::class,
        ]
    ]
];