<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',]
];
