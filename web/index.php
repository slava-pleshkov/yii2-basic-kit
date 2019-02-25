<?php

use codemix\yii2confload\Config;

require(__DIR__ . '/../vendor/autoload.php');
$config = Config::bootstrap(__DIR__ . '/..');
Yii::createObject('yii\web\Application', [$config->web()])->run();
