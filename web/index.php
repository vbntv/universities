<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

if (array_key_exists('CODECEPTION_COOKIE', $_COOKIE)) {
    $config = require __DIR__ . '/../config/test.php';
} else {
    $config = require __DIR__ . '/../config/web.php';
}

(new yii\web\Application($config))->run();
